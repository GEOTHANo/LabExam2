<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();  // Get all tasks from the database
        return view('index', compact('tasks'));  // Pass the tasks to the view
    }

    

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Task::create($request->all());

        return redirect()->route('index');
    }

    public function edit(Task $task)
    {
        return view('edit', compact('task'));
    }
    
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_completed' => 'nullable|boolean',
        ]);
    
        $task->title = $request->title;
        $task->description = $request->description;
        $task->is_completed = $request->has('is_completed');
    
        $task->save();
    
        return redirect()->route('tasks.index');
    }
    
    
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}