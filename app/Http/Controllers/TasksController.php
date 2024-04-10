<?php

namespace App\Http\Controllers;

use App\Models\Task;
use HotwiredLaravel\TurboLaravel\Http\Controllers\Concerns\InteractsWithTurboNativeNavigation;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    use InteractsWithTurboNativeNavigation;

    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->validate([
            'title' => ['required'],
        ]));

        return $this->recedeOrRedirectBack(route('dashboard'))->with('notice', __('Task Updated.'));
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return $this->recedeOrRedirectBack(route('dashboard'))->with('notice', __('Task Deleted.'));
    }
}
