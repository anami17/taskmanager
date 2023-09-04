<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function dashboard(Request $request)
{
    $user = auth()->user();
    $status = $request->input('status');
    $tasks = Task::where('user_id', $user->id);

    if ($status) {
        $tasks->where('status', $status);
    }
    $tasks = $tasks->get();

    return view('dashboard', compact('tasks'));
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

        $data['user_id'] = auth()->id();

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

    public function userTasks()
    {
        $user = Auth::user();

        $tasks = Task::where('user_id', $user->id)->get();

        return view('/dashboard', compact('tasks'));
    }
} 
