<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimeslotRequest;
use App\Http\Requests\UpdateTimeslotRequest;
use App\Models\Timeslot;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeslots = Timeslot::orderBy('id', 'asc')->where('cancel_state', 0)->get();

        return response()->json($timeslots);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'cancel_state' => 'required|integer',
        ]);

        $timeslot = new Timeslot;

        $timeslot->title = $request->title;
        $timeslot->start_date = $request->start_date;
        $timeslot->end_date = $request->end_date;
        $timeslot->start_time = $request->start_time;
        $timeslot->end_time = $request->end_time;
        $timeslot->cancel_state = $request->cancel_state;

        $timeslot->save();
        \Log::info(response()->json($timeslot));
        return response()->json($timeslot);
        
    }

    public function getTimeslot($id)
    {
        $timeslot = Timeslot::findOrFail($id);
        \Log::info($timeslot);

        return response()->json($timeslot);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTimeslotRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimeslotRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function show(Timeslot $timeslot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function edit(Timeslot $timeslot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTimeslotRequest  $request
     * @param  \App\Models\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'cancel_state' => 'required|integer',
        ]);

        $timeslot = Timeslot::findOrFail($id);

        $timeslot->title = $request->title;
        $timeslot->start_date = $request->start_date;
        $timeslot->end_date = $request->end_date;
        $timeslot->start_time = $request->start_time;
        $timeslot->end_time = $request->end_time;
        $timeslot->cancel_state = $request->cancel_state;

        $timeslot->save();

        \Log::info(response()->json($timeslot));
        return response()->json($timeslot);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timeslot  $timeslot
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        $timeslot = Timeslot::findOrFail($id);

        $timeslot->cancel_state = 1;

        $timeslot->save();

        return response()->json($timeslot);
    }
}
