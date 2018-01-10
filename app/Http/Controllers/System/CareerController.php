<?php

namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Career;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Campus;

class CareerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $career = Career::all();

        return view('backEnd.system.career.index', compact('career'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $campuses = Campus::pluck('name','id');
        return view('backEnd.system.career.create')
        ->with('campuses', $campuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        Career::create($request->all());

        Session::flash('message', 'Career added!');
        Session::flash('status', 'success');

        return redirect('system/career');
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
        $career = Career::findOrFail($id);

        return view('backEnd.system.career.show', compact('career'));
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
        $campuses = Campus::pluck('name','id');
        $career = Career::findOrFail($id);

        return view('backEnd.system.career.edit', compact('career'))
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
        $this->validate($request, ['name' => 'required', ]);

        $career = Career::findOrFail($id);
        $career->update($request->all());

        Session::flash('message', 'Career updated!');
        Session::flash('status', 'success');

        return redirect('system/career');
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
        $career = Career::findOrFail($id);

        $career->delete();

        Session::flash('message', 'Career deleted!');
        Session::flash('status', 'success');

        return redirect('system/career');
    }

}
