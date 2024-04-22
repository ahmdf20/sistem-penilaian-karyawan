<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(): View
    {
        return view('task.index', [
            'title' => 'SPK | Task',
            'tasks' => Task::where([
                ['deleted_at', null]
            ])->get()->all()
        ]);
    }
}
