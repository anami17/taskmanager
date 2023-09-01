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
                                    <div class="card-body">

                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>  
                                                    
                                                </tr>
                                            </thead>
                                        <tbody>
                                        @foreach($tasks as $task)
                                    <tr>
                                        <td>{{$task->title}}</td>
                                        <td>{{$task->description}}</td>
                                        <td>{{$task->status}}</td>
                                        <td>
                                        <a href="{{route('tasks.edit', ['task' => $task])}}" class="btn btn-success">Edit</a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{route('tasks.destroy', ['task' => $task])}}">
                                                @csrf
                                                @method('delete')
                                            <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                        @endforeach
                                        </tbody>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
