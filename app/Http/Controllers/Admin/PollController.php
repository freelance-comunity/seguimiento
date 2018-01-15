<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Poll;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Notify;

class PollController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $poll = Poll::all();

        return view('backEnd.admin.poll.index', compact('poll'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.poll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'type' => 'required', 'description' => 'required|max:50', 'initial_message' => 'required', 'final_message' => 'required',]);

        Poll::create($request->all());

        Session::flash('success', 'Encuesta agregada exitosamente.');
        Session::flash('status', 'success');

        return redirect('admin/poll');
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
        $poll = Poll::findOrFail($id);

        return view('backEnd.admin.poll.show', compact('poll'));
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
        $poll = Poll::findOrFail($id);

        return view('backEnd.admin.poll.edit', compact('poll'));
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
        $this->validate($request, ['name' => 'required', 'type' => 'required', 'description' => 'required|max:50', 'initial_message' => 'required', 'final_message' => 'required',]);

        $poll = Poll::findOrFail($id);
        $poll->update($request->all());

        Session::flash('message', 'Encuesta actualizada exitosamente.');
        Session::flash('status', 'success');

        return redirect('admin/poll');
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
        $poll = Poll::findOrFail($id);

        $poll->delete();

        Session::flash('message', 'Encuesta eliminada exitosamente.');
        Session::flash('status', 'success');

        return redirect('admin/poll');
    }

    /**
     * Search the specified resource from storage.
     * And we show the question creation view
     * @param  int  $id
     *
     * @return Response
     */
    public function addQuestion($id)
    {
        $poll = Poll::findOrFail($id);
        return view('backEnd.admin.question.create')
        ->with('poll', $poll);
    }
}
