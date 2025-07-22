<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ Log, Http };
use Carbon\Carbon;

class MeetingsController extends Controller
{
    public function index(Request $request)
    {
        return view('meetings.index');
    }

    public function create(Request $request)
    {
        return view('meetings.create');
    }

    public function store(Request $request)
    {
        $endDate = Carbon::parse($request->datetime_stream, 'America/Sao_Paulo')
            ->setSeconds(0)
            ->timezone('UTC')
            ->format('Y-m-d\TH:i:s.000\Z');

        $token = getWherebyKey();

        $response = Http::withToken($token)
            ->post('https://api.whereby.dev/v1/meetings', [
                'endDate' => $endDate
            ]);

        return redirect()
            ->route('meetings.index')
            ->with(['message' => 'Transmissão Iniciada com Sucesso!']);
    }

    public function show(Request $request)
    {

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
