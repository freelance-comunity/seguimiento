<?php

namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Status;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class StatusController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $status = Status::all();

        return view('backEnd.system/props.status.index', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.system/props.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        Status::create($request->all());

        Session::flash('message', 'Status added!');
        Session::flash('status', 'success');

        return redirect('system/props/status');
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
        $status = Status::findOrFail($id);

        return view('backEnd.system/props.status.show', compact('status'));
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
        $status = Status::findOrFail($id);

        return view('backEnd.system/props.status.edit', compact('status'));
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

        $status = Status::findOrFail($id);
        $status->update($request->all());

        Session::flash('message', 'Status updated!');
        Session::flash('status', 'success');

        return redirect('system/props/status');
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
        $status = Status::findOrFail($id);

        $status->delete();

        Session::flash('message', 'Status deleted!');
        Session::flash('status', 'success');

        return redirect('system/props/status');
    }

}
