<?php

namespace App\Http\Controllers\System;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Teacher;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Campus;
use App\Status;
use App\User;
use Hash;

class TeacherController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $teacher = Teacher::all();

        return view('backEnd.system.teacher.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $campuses = Campus::pluck('name', 'id');
        $statuses = Status::pluck('name', 'id');
        return view('backEnd.system.teacher.create')
        ->with('campuses', $campuses)
        ->with('statuses', $statuses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
          $this->validate($request, ['name' => 'required', 'last_name' => 'required', 'username' => 'required', 'password' => 'required', ]);

          // *********************
          // Create user
          // *********************
          $user = new User();
          $user->name = $request->input('name');
          $user->email = $request->input('email');
          $user->password = Hash::make($request->input('password'));
          $user->save();

          $input = $request->all();
          $input['user_id'] = $user->id;

          Teacher::create($input);

          Session::flash('message', 'Teacher added!');
          Session::flash('status', 'success');

          return redirect('system/teacher');
        } catch (\Exception $e) {
          Session::flash('error', 'Teacher added!');
          Session::flash('status', 'success');

          return redirect('system/teacher');
        }

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
        $teacher = Teacher::findOrFail($id);

        return view('backEnd.system.teacher.show', compact('teacher'));
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
        $teacher = Teacher::findOrFail($id);

        return view('backEnd.system.teacher.edit', compact('teacher'));
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
        $this->validate($request, ['name' => 'required', 'last_name' => 'required', 'username' => 'required', 'password' => 'required', ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());

        Session::flash('message', 'Teacher updated!');
        Session::flash('status', 'success');

        return redirect('system/teacher');
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
        $teacher = Teacher::findOrFail($id);

        $teacher->delete();

        Session::flash('message', 'Teacher deleted!');
        Session::flash('status', 'success');

        return redirect('system/teacher');
    }

}
