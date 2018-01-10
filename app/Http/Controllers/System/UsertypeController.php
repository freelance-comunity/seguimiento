<?php

namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Usertype;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class UsertypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $usertype = Usertype::all();

        return view('backEnd.system/props.usertype.index', compact('usertype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.system/props.usertype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', ]);

        Usertype::create($request->all());

        Session::flash('message', 'Usertype added!');
        Session::flash('status', 'success');

        return redirect('system/props/usertype');
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
        $usertype = Usertype::findOrFail($id);

        return view('backEnd.system/props.usertype.show', compact('usertype'));
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
        $usertype = Usertype::findOrFail($id);

        return view('backEnd.system/props.usertype.edit', compact('usertype'));
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

        $usertype = Usertype::findOrFail($id);
        $usertype->update($request->all());

        Session::flash('message', 'Usertype updated!');
        Session::flash('status', 'success');

        return redirect('system/props/usertype');
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
        $usertype = Usertype::findOrFail($id);

        $usertype->delete();

        Session::flash('message', 'Usertype deleted!');
        Session::flash('status', 'success');

        return redirect('system/props/usertype');
    }

}
