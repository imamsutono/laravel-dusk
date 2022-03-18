<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:100'
        ]);

        $task = new Task;
        $task->title = $data['title'];

        $task->save();

        return redirect('/tasks');
    }
}
