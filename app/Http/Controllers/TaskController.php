<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $data['tasks'] = Task::paginate(10);
        return view('task.index', $data);
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(TaskRequest $request)
    {
        $task = Task::create($request->validated());


        return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task created successfully!');
    }

    public function show(Task $task)
    {
        return view('task.show', [
            'task' => $task
        ]);
    }
    public function edit(Task $task)
    {
        return view('task.edit', [
            'task' => $task
        ]);
    }

    public function update(Task $task, TaskRequest $request)
    {
        $task->update($request->validated());


        return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task updated successfully!');
    }

    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }
}
