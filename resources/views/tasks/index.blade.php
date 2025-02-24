@extends('app')

@section('title', 'HomePage')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-4">Task Manager</h2>
            
            @if(session('message'))
                <div class="alert alert-warning">{{ session('message') }}</div>
            @endif
            
            <div class="card mb-3">
                <div class="card-body">
                    <form method="POST" action="/projects" class="d-flex gap-2">
                        @csrf
                        <input type="text" name="name" class="form-control" required placeholder="New Project Name">
                        <button type="submit" class="btn btn-primary">Add Project</button>
                    </form>
                </div>
            </div>
            
            @if($projects->isNotEmpty())
                <div class="card mb-3">
                    <div class="card-body">
                        <form method="GET" action="/">
                            <label for="project_id" class="form-label">Select Project:</label>
                            <select name="project_id" id="project_id" class="form-select" onchange="this.form.submit()">
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" {{ $selectedProjectId == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-body">
                        <form method="POST" action="/tasks" class="d-flex gap-2">
                            @csrf
                            <input type="text" name="name" class="form-control" required placeholder="New Task Name">
                            <input type="hidden" name="project_id" value="{{ $selectedProjectId }}">
                            <button type="submit" class="btn btn-success">Add Task</button>
                        </form>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <ul id="task-list" class="list-group">
                            @foreach($tasks as $task)
                                <li class="list-group-item d-flex justify-content-between align-items-center" data-id="{{ $task->id }}">
                                    <span>{{ $task->name }}</span>
                                    <div>
                                        <a href="/tasks/{{ $task->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                        <form method="POST" action="/tasks/{{ $task->id }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @endsection