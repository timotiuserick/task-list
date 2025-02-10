<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $projectId)
    {
        $project = Project::find($projectId);
        $tasks = Task::where('project_id', $projectId)->orderBy('order', 'asc')->orderBy('created_at', 'asc')->get();

        return view('task.home', ['project' => $project, 'tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $projectId)
    {
        return view('task.create', ['projectId' => $projectId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $projectId)
    {
        $data = $request->validate([
            'title' => ['required']
        ]);

        $input = $request->all();
        $input['project_id'] = $projectId;

        $task = Task::create($input);

        return to_route('task.show', $task->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);

        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);

        return view('task.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => ['required']
        ]);

        $task = Task::find($id);
        $task->update($data);

        return to_route('task.show', $task->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $projectId = $task->project_id;
        $task->delete();

        return to_route('task.index', $projectId);
    }
}
