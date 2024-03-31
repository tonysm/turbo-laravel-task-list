<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListTasksController extends Controller
{
    public function create(TaskList $taskList)
    {
        return view('tasks.create', [
            'taskList' => $taskList,
        ]);
    }

    public function store(Request $request, TaskList $taskList)
    {
        $task = $taskList->tasks()->create($request->validate([
            'title' => ['required'],
        ]));

        if ($request->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream($task)->target(dom_id($taskList, 'tasks')),
                turbo_stream()->update(dom_id($taskList, 'create_task'), view('tasks.partials.form', [
                    'taskList' => $taskList,
                ])),
            ]);
        }

        return back();
    }
}
