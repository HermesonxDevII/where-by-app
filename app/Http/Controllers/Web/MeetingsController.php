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
        // Log::info('request', [$request->all()]);
        // return view('meetings.create');

        $validatedData = $request->validated();

        $token = getWherebyKey();

        $data = [
            'endDate'        => formatUTCDate($validatedData['end_dateTime']),
            'isLocked'       => filter_var($validatedData['is_locked'], FILTER_VALIDATE_BOOLEAN),
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

        $user = loggedUser();

        $user->meetings()->create([
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
        
        $meeting = $user->meeting;

        return redirect()
            ->route('meetings.show', $meeting->id)
            ->with(['message' => 'Transmissão Iniciada com Sucesso!']);
    }

    public function show(Request $request, Meeting $meeting)
    {
        return view('meetings.show', compact('meeting'));
    }
    
    public function edit(Request $request)
    {

    }
    
    public function update(Request $request)
    {

    }
    
    public function destroy(Request $request)
    {

    }
}
