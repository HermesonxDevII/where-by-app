<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
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

        $endDate = Carbon::parse($request->end_dateTime, 'America/Sao_Paulo')
            ->setSeconds(0)
            ->timezone('UTC')
            ->format('Y-m-d\TH:i:s.000\Z');

        $token = getWherebyKey();

        $data = [
            'endDate'   => $endDate,
            'isLocked'  => filter_var($validatedData['is_locked'], FILTER_VALIDATE_BOOLEAN),
            'roomMode'  => $validatedData['type'],
            'recording' => [
                "type" => $validatedData['record_type'],
                "destination" => [
                    "provider"        => $validatedData['record_location'],
                    "bucket"          => "",
                    "accessKeyId"     => "",
                    "accessKeySecret" => "",
                    "fileFormat"      => $validatedData['record_format']
                ],
                "startTrigger" => $validatedData['record_trigger']
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
            'name'        => $validatedData['name'],
            'description' => $validatedData['description'],
            'start_date'   => Carbon::parse($apiData['startDate'], 'America/Fortaleza')->format('Y-m-d H:i:s'),
            'end_date'     => Carbon::parse($apiData['endDate'], 'America/Fortaleza')->format('Y-m-d H:i:s'),
            'room_name'    => $apiData['roomName'],
            'room_url'     => $apiData['roomUrl'],
            'meeting_id'   => $apiData['meetingId']
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
