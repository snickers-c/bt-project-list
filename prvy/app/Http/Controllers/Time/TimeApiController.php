<?php

namespace App\Http\Controllers\Time;

use App\Http\Controllers\Controller;
use App\Services\TimeService;
use Illuminate\Http\Request;

class TimeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TimeService $timeService)
    {
        return response()->json(['current_time' => "aktuálny čas je {$timeService->time()}"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}