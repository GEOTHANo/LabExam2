<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    

    public function index()
    {
        $tasks = Task::all();
        return view('index', compact('tasks'));
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

        task::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('index')->with('success', 'Task created successfully.');
    }
    public function edit(Task $task)
    {
        return view('edit', compact('tasks'));
    }
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_completed' => 'nullable|boolean', 
        ]);
        $task->is_completed = $request->has('is_completed') ? true : false;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();

        return redirect()->route('index')->with('Done', 'Updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('index')->with('Done', 'deleted successfully.');

    }
}
