<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome, {{auth()->user()->name}}!
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class ="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                    <h4>Task Management System
                                         <a href="/tasks/create" class="btn btn-primary float-end">Add Task</a>
                                    </h4>
                                    </div>

                                    @if(count($tasks) > 0)
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>
                                                        <form action="" method="GET">
                                                            <div class="col-md-12">  
                                                                <select name="status" onchange="this.form.submit()">
                                                                    <option  value="">Select Status</option>
                                                                    <option  value="">All</option>
                                                                    <option  value="pending">Pending</option>
                                                                    <option  value="in progress">In Progress</option>
                                                                    <option  value="completed">Completed</option>
                                                                </select>
                                                            </div>
                                                        </form>
                                                    </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                        @foreach($tasks as $task)
                                    <tr>
                                        <td>{{$task->title}}</td>
                                        <td>{{$task->description}}</td>
                                        <td>{{$task->status}}</td>
                                        <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn btn-success">Edit</a>
                                            <form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">Delete</button>
                                                <label>
                                                    <input type="checkbox" name="status" value="active"> Completed
                                                </label>
                                            </form>
                                        </div>
                                        </td>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>You have no tasks.</p>
                                    <div class="card-header">
                                    <a href="/dashboard" class="btn btn-danger float-end">BACK</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
