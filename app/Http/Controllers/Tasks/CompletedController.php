<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Models\Task;
use HotwiredLaravel\TurboLaravel\Http\Controllers\Concerns\InteractsWithTurboNativeNavigation;

class CompletedController extends Controller
{
    use InteractsWithTurboNativeNavigation;

    public function update(Task $task)
    {
        $task->toggleCompletion();

        return $this->refreshOrRedirectBack(route('dashboard'))->with('notice', __('Task Updated.'));
    }
}
