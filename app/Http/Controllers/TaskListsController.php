<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use HotwiredLaravel\TurboLaravel\Http\Controllers\Concerns\InteractsWithTurboNativeNavigation;
use Illuminate\Http\Request;

class TaskListsController extends Controller
{
    use InteractsWithTurboNativeNavigation;

    public function index(Request $request)
    {
        return view('task_lists.index', [
            'taskLists' => $request->user()->taskLists()->oldest()->get(),
        ]);
    }

    public function show(TaskList $taskList)
    {
        return view('task_lists.show', [
            'taskList' => $taskList,
        ]);
    }

    public function create()
    {
        return view('task_lists.create');
    }

    public function store(Request $request)
    {
        $taskList = $request->user()->taskLists()->create($request->validate([
            'title' => ['required'],
        ]));

        if ($request->wantsTurboStream()) {
            return turbo_stream([
                turbo_stream($taskList),
                turbo_stream()->flash(__('Task List Created.')),
            ]);
        }

        return back();
    }

    public function edit(TaskList $taskList)
    {
        return view('task_lists.edit', [
            'taskList' => $taskList,
        ]);
    }

    public function update(Request $request, TaskList $taskList)
    {
        $taskList->update($request->validate([
            'title' => ['required', 'max:255'],
        ]));

        return $this->recedeOrRedirectTo(route('task-lists.show', $taskList))->with('notice', __('Task List Updated.'));
    }

    public function destroy(TaskList $taskList)
    {
        $taskList->tasks->each->delete();
        $taskList->delete();

        return back()->with('notice', __('Task List Deleted.'));
    }
}
