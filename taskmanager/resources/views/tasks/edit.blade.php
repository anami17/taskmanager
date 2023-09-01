<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="container mt-5">
    <div class="row"
        <div class="col-md-12">
            <div class="card">
                <div class="card header">
                    <h4>User App
                        <a href="/dashboard" class="btn btn-danger float-end">BACK</a>
                    </h4>  
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('tasks.update', [$task->id])}}">
                        @csrf
                        @method('put')
                    
                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{$task->title}}">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" value="{{$task->description}}">
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="text" name="status" class="form-control" value="{{$task->status}}">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class ="btn btn-primary">Update</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
