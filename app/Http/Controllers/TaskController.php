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
        $tasks = Task::where('project_id', $projectId)
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('task.home', [
            'project' => $project,
            'tasks' => $tasks
        ]);
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

        // Assign priority level
        $largestPriorityTask = Task::where('project_id', $projectId)->orderBy('order', 'desc')->first();
        if ($largestPriorityTask)
        {
            $largestPriorityNumber = $largestPriorityTask->order;
            $input['order'] = $largestPriorityNumber + 1;
        }
        else
        {
            $input['order'] = 1;
        }

        $task = Task::create($input);

        return to_route('task.show', $task->id);
    }

    /**
     * Sort resources.
     */
    public function sort(Request $request, string $projectId)
    {
        $data = $request->validate([
            'old_order' => ['required'],
            'new_order' => ['required']
        ]);

        $input = $request->all();
        $oldPriorityNumber = $input['old_order'];
        $newPriorityNumber = $input['new_order'];

        // Get the targetted task
        $task = Task::where('project_id', $projectId)->where('order', $oldPriorityNumber)->first();

        // Get & update the affected tasks by this sorting
        $affectedTasks = [];

        if ($newPriorityNumber > $oldPriorityNumber)
        {
            $affectedTasks = Task::where('project_id', $projectId)
                ->where('order', '>', $oldPriorityNumber)
                ->where('order', '<=', $newPriorityNumber)
                ->get();

            foreach ($affectedTasks as $tempTask)
            {
                $tempTask->order -= 1;
                $tempTask->save();
            }
        }
        else if ($newPriorityNumber < $oldPriorityNumber)
        {
            $affectedTasks = Task::where('project_id', $projectId)
                ->where('order', '>=', $newPriorityNumber)
                ->where('order', '<', $oldPriorityNumber)
                ->get();

            foreach ($affectedTasks as $tempTask)
            {
                $tempTask->order += 1;
                $tempTask->save();
            }
        }
        else
        {
            return to_route('task.index', $projectId);
        }

        $task->order = $newPriorityNumber;
        $task->save();

        return to_route('task.index', $projectId);
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

        $input = $request->all();

        $task = Task::find($id);
        $task->update($input);

        return to_route('task.show', $task->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $projectId = $task->project_id;
        $priorityNumber = $task->order;

        // Increase priority of tasks below the deleted one to remove the gap
        $affectedTasks = Task::where('project_id', $projectId)->where('order', '>', $priorityNumber)->get();

        if ($affectedTasks)
        {
            foreach ($affectedTasks as $tempTask)
            {
                $tempTask->order -= 1;
                $tempTask->save();
            }
        }

        $task->delete();

        return to_route('task.index', $projectId);
    }
}
