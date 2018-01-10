<?php

namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Campus;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CampusController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $campus = Campus::all();

        return view('backEnd.system.campus.index', compact('campus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.system.campus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        Campus::create($request->all());

        Session::flash('message', 'Campus added!');
        Session::flash('status', 'success');

        return redirect('system/campus');
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
        $campus = Campus::findOrFail($id);

        return view('backEnd.system.campus.show', compact('campus'));
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
        $campus = Campus::findOrFail($id);

        return view('backEnd.system.campus.edit', compact('campus'));
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

        $campus = Campus::findOrFail($id);
        $campus->update($request->all());

        Session::flash('message', 'Campus updated!');
        Session::flash('status', 'success');

        return redirect('system/campus');
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
        $campus = Campus::findOrFail($id);

        $campus->delete();

        Session::flash('message', 'Campus deleted!');
        Session::flash('status', 'success');

        return redirect('system/campus');
    }

}
