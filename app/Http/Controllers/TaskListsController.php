<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskListsController extends Controller
{
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
