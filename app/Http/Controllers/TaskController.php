<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $data['tasks'] = Task::with('category')->paginate(10);
        return view('task.index', $data);
    }

    public function create()
    {

        $categories = Category::all();
        return view('task.create', ['categories' => $categories]);
    }

    public function store(TaskRequest $request)
    {

        // $task = Task::create($request->validated());


        // return redirect()->route('tasks.show', ['task' => $task->id])
        //     ->with('success', 'Task created successfully!');
        $validatedData = $request->validated();

        // return  $validatedData;
        $task = Task::create([


            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'long_description' => $validatedData['long_description'],
            'category_id' => $validatedData['category_id']


        ]);



        return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task created successfully!');
    }

    public function show(Task $task)
    {

        return view('task.show', [
            'task' => $task,


        ]);
        // $taskWithCategory = $task->load('category');

        // return view('task.show', [
        //     'task' => $taskWithCategory,
        // ]);
        // $data1['task'] = Task::with('category')->get();
        // return view('task.show', $data1);
    }
    public function edit(Task $task)
    {

        $categories = Category::all();

        return view('task.edit', [
            'task' => $task, 'categories' => $categories
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
