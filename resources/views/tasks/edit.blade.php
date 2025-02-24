@extends('app')

@section('title', 'Edit Task')

@section('content')
    <h2>Edit Task</h2>
    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Task Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>
        </div>

        <div class="mb-3">
            <label for="project_id" class="form-label">Project</label>
            <select name="project_id" id="project_id" class="form-select" disabled>
                @foreach($projects as $project)
                    <option  value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="/" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
