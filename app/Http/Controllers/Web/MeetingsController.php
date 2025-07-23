<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ Log, Http };
use App\Http\Requests\{ StoreMeetingRequest };
use App\Models\{ Meeting };

class MeetingsController extends Controller
{
    public function index(Request $request)
    {
        $meetings = Meeting::get();

        return view('meetings.index', compact('meetings'));
    }

    public function create(Request $request)
    {
        return view('meetings.create');
    }

    public function store(StoreMeetingRequest $request)
    {
        $validatedData = $request->validated();

        $token = getWherebyKey();

        $data = [
            'endDate'        => formatUTCDate($validatedData['end_dateTime']),
            'isLocked'       => filter_var($validatedData['is_locked'] ?? false, FILTER_VALIDATE_BOOLEAN),
            'roomMode'       => $validatedData['type'],
            'roomNamePrefix' => generateSlug($validatedData['name']),
            'recording' => [
                'type' => $validatedData['record_type'],
                'destination' => [
                    'provider'        => $validatedData['record_location'],
                    'bucket'          => '',
                    'accessKeyId'     => '',
                    'accessKeySecret' => '',
                    'fileFormat'      => $validatedData['record_format']
                ],
                'startTrigger' => $validatedData['record_trigger']
            ],
            'fields' => [
                'hostRoomUrl',
                'viewerRoomUrl'
            ]
        ];
        
        $response = Http::withToken($token)
            ->post('https://api.whereby.dev/v1/meetings', $data);

        if ($response->failed()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => 'Não foi possível criar a sala de transmissão. Tente novamente mais tarde.']);
        }

        $apiData = $response->json();

        $meeting = loggedUser()->meetings()->create([
            'name'            => $validatedData['name'],
            'description'     => $validatedData['description'],
            'start_date'      => formatBrazilDate($apiData['startDate']),
            'end_date'        => formatBrazilDate($apiData['endDate']),
            'room_name'       => $apiData['roomName'],
            'room_url'        => $apiData['roomUrl'],
            'host_room_url'   => $apiData['hostRoomUrl'],
            'viewer_room_url' => $apiData['viewerRoomUrl'],
            'meeting_id'      => $apiData['meetingId']
        ]);

        return redirect()->route('meetings.show', $meeting->id);
    }

    public function show(Request $request, Meeting $meeting)
    {
        if (!$meeting) {
            return redirect()->route('meetings.index');
        }

        $isHost = loggedUser()->id === $meeting->user_id;

        return view('meetings.show', compact('meeting', 'isHost'));
    }
    
    public function edit(Request $request)
    {

    }
    
    public function update(Request $request)
    {

    }
    
    public function info(Request $request, Meeting $meeting)
    {
        return view('meetings.info', compact('meeting'));
    }

    public function history(Request $request)
    {
        $meetings = Meeting::withoutGlobalScope('endDate')
                        ->orderBy('end_date', 'desc')
                        ->paginate(3);

        return view('meetings.history', compact('meetings'));
    }

    public function destroy(Request $request, Meeting $meeting)
    {
        if (!loggedUser()->id === $meeting->user_id) {
            return redirect()->route('meetings.index');
        }

        $token = getWherebyKey();

        $response = Http::withToken($token)
            ->delete("https://api.whereby.dev/v1/meetings/{$meeting->meeting_id}");

        if ($response->failed()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => 'Não foi possível deletar a sala de transmissão. Tente novamente mais tarde.']);
        }

        $meeting->delete();

        return redirect()->route('meetings.index');
    }
}
