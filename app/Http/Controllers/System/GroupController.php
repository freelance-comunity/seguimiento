<?php

namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Group;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Campus;

class GroupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $group = Group::all();

        return view('backEnd.system/props.group.index', compact('group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $campuses = Campus::pluck('name','id');
        return view('backEnd.system/props.group.create')
        ->with('campuses', $campuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'nomenclature' => 'required', ]);

        Group::create($request->all());

        Session::flash('message', 'Group added!');
        Session::flash('status', 'success');

        return redirect('system/props/group');
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
        $group = Group::findOrFail($id);

        return view('backEnd.system/props.group.show', compact('group'));
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
        $group = Group::findOrFail($id);
        $campuses = Campus::pluck('name','id');
        return view('backEnd.system/props.group.edit', compact('group'))
        ->with('campuses', $campuses);
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
        $this->validate($request, ['name' => 'required', 'nomenclature' => 'required', ]);

        $group = Group::findOrFail($id);
        $group->update($request->all());

        Session::flash('message', 'Group updated!');
        Session::flash('status', 'success');

        return redirect('system/props/group');
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
        $group = Group::findOrFail($id);

        $group->delete();

        Session::flash('message', 'Group deleted!');
        Session::flash('status', 'success');

        return redirect('system/props/group');
    }

}
