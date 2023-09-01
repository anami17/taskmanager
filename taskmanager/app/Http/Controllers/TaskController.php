<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function dashboard () {
        $tasks = Task::all();
        return view('/dashboard', compact('tasks'));      
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $newTask = Task::create($data);

        return redirect(route('dashboard'));
    }

    public function edit(Task $task) {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Task $task, Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required', 
            'status' => 'required'
        ]);

        $task->update($data);

        return redirect(route('dashboard'));
    }

    public function destroy(Task $task) {
        $task->delete();

        return redirect(route('dashboard'));
        
    }
    
} 
