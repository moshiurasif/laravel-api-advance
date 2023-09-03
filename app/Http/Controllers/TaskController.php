<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return new TaskCollection(Task::all());
    }

    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255'
        ]);
        $task = Task::create($request->title);
        return new TaskResource($task);
    }
}
