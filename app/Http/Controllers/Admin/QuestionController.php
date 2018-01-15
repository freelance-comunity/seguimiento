<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Question;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class QuestionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $question = Question::all();

        return view('backEnd.admin.question.index', compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'type_of_response' => 'required', 'required' => 'required', ]);
        $input = $request->all();
        dd($input);
        // Question::create($request->all());
        //
        // Session::flash('message', 'Question added!');
        // Session::flash('status', 'success');
        //
        // return redirect('admin/question');
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
        $question = Question::findOrFail($id);

        return view('backEnd.admin.question.show', compact('question'));
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
        $question = Question::findOrFail($id);

        return view('backEnd.admin.question.edit', compact('question'));
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
        $this->validate($request, ['name' => 'required', 'type_of_response' => 'required', 'required' => 'required', ]);

        $question = Question::findOrFail($id);
        $question->update($request->all());

        Session::flash('message', 'Question updated!');
        Session::flash('status', 'success');

        return redirect('admin/question');
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
        $question = Question::findOrFail($id);

        $question->delete();

        Session::flash('message', 'Question deleted!');
        Session::flash('status', 'success');

        return redirect('admin/question');
    }

}
