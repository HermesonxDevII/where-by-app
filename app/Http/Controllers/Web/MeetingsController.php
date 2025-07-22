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
        $validatedData = $request->validated();

        $endDate = Carbon::parse($request->datetime_stream, 'America/Sao_Paulo')
            ->setSeconds(0)
            ->timezone('UTC')
            ->format('Y-m-d\TH:i:s.000\Z');

        $token = getWherebyKey();

        $response = Http::withToken($token)
            ->post('https://api.whereby.dev/v1/meetings', [
                'endDate' => $endDate
            ]);

        if ($response->failed()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => 'Não foi possível criar a sala de transmissão. Tente novamente mais tarde.']);
        }

        $apiData = $response->json();

        $user = loggedUser()->meetings()->create([
            'name'        => $validatedData['name'],
            'description' => $validatedData['description'],
            'start_date'   => Carbon::parse($apiData['startDate'])->format('Y-m-d H:i:s'),
            'end_date'     => Carbon::parse($apiData['endDate'])->format('Y-m-d H:i:s'),
            'room_name'    => $apiData['roomName'],
            'room_url'     => $apiData['roomUrl'],
            'meeting_id'   => $apiData['meetingId']
        ]);

        return redirect()
            ->route('meetings.index')
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
