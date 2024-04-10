<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskListsController extends Controller
{
    public function index(Request $request)
    {
        return view('task_lists.index', [
            'taskLists' => $request->user()->taskLists()->oldest()->get(),
        ]);
    }

    public function create()
    {
        return view('task-lists.create');
    }

    public function store(Request $request)
    {
        $taskList = $request->user()->taskLists()->create($request->validate([
            'title' => ['required'],
        ]));

        if ($request->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream($taskList),
                turbo_stream()->flash(__('Task Created.')),
            ]);
        }

        return back();
    }
}
