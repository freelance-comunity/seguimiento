<?php

namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Subject;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class SubjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $subject = Subject::all();

        return view('backEnd.system.subject.index', compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.system.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'nomenclature' => 'required', ]);

        Subject::create($request->all());

        Session::flash('message', 'Subject added!');
        Session::flash('status', 'success');

        return redirect('system/subject');
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
        $subject = Subject::findOrFail($id);

        return view('backEnd.system.subject.show', compact('subject'));
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
        $subject = Subject::findOrFail($id);

        return view('backEnd.system.subject.edit', compact('subject'));
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

        $subject = Subject::findOrFail($id);
        $subject->update($request->all());

        Session::flash('message', 'Subject updated!');
        Session::flash('status', 'success');

        return redirect('system/subject');
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
        $subject = Subject::findOrFail($id);

        $subject->delete();

        Session::flash('message', 'Subject deleted!');
        Session::flash('status', 'success');

        return redirect('system/subject');
    }

}
