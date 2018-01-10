<?php

namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cycle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CycleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cycle = Cycle::all();

        return view('backEnd.system/props.cycle.index', compact('cycle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.system/props.cycle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        Cycle::create($request->all());

        Session::flash('message', 'Cycle added!');
        Session::flash('status', 'success');

        return redirect('system/props/cycle');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cycle = Cycle::findOrFail($id);

        return view('backEnd.system/props.cycle.show', compact('cycle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cycle = Cycle::findOrFail($id);

        return view('backEnd.system/props.cycle.edit', compact('cycle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        $cycle = Cycle::findOrFail($id);
        $cycle->update($request->all());

        Session::flash('message', 'Cycle updated!');
        Session::flash('status', 'success');

        return redirect('system/props/cycle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cycle = Cycle::findOrFail($id);

        $cycle->delete();

        Session::flash('message', 'Cycle deleted!');
        Session::flash('status', 'success');

        return redirect('system/props/cycle');
    }

}
