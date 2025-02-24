<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::all();
        if ($projects->isEmpty()) {
            return view('tasks.index', compact('projects'))->with('message', 'Please add a project first.');
        }
        
        $selectedProjectId = $request->project_id ?? $projects->first()->id;
        $tasks = Task::where('project_id', $selectedProjectId)->orderBy('priority')->get();
        
        return view('tasks.index', compact('tasks', 'projects', 'selectedProjectId'));
    }

    public function store(Request $request)
    {
        $priority = Task::where('project_id', $request->project_id)->count() + 1;
        Task::create(['name' => $request->name, 'priority' => $priority, 'project_id' => $request->project_id]);
        return back();
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->only('name'));
        return redirect('/')->with('message', 'Task updated successfully!');
    }

    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }

    public function reorder(Request $request)
    {
        foreach ($request->tasks as $index => $id) {
            Task::where('id', $id)->update(['priority' => $index + 1]);
        }
        return response()->json(['success' => true]);
    }
}