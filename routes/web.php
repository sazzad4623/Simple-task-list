<?php

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// class Task
// {
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at
//     ) {
//     }
// }

// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),
//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),
//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),
//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     ),
// ];

Route::get(
    '/',
    function () {
        return redirect()->route('tasks.index');
    }
);


Route::get(
    '/tasks',
    function () {
        return view('index', [

            'tasks' => Task::latest()->paginate(10)
        ]);
    }
)->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

// Route::get('/tasks/{id}/edit', function ($id) {
//     return view('edit', [
//         'task' => Task::findOrFail($id)
//     ]);
// })->name('tasks.edit');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

// Route::get('/tasks/{id}', function ($id) {
//     return view('show', [
//         'task' => Task::findOrFail($id)
//     ]);
// })->name('tasks.show');


Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

// Route::post('/tasks', function (Request $request) {

//     $data = $request->validate([
//         'title' => 'required|max:255',
//         'description' => 'required',
//         'long_description' => 'required'
//     ]);

//     $task = new Task;
//     $task->title = $data['title'];
//     $task->description = $data['description'];
//     $task->long_description = $data['long_description'];
//     $task->save();

//     return redirect()->route('tasks.show', ['id' => $task->id])
//         ->with('success', 'Task created successfully!');
// })->name('tasks.store');

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());


    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');

// Route::put('/tasks/{id}', function ($id, Request $request) {
//     $data = $request->validate([
//         'title' => 'required|max:255',
//         'description' => 'required',
//         'long_description' => 'required'
//     ]);

//     $task = Task::findOrFail($id);
//     $task->title = $data['title'];
//     $task->description = $data['description'];
//     $task->long_description = $data['long_description'];
//     $task->save();

//     return redirect()->route('tasks.show', ['id' => $task->id])
//         ->with('success', 'Task updated successfully!');
// })->name('tasks.update');


Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());


    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();

    return redirect()->back()->with('success', 'Task updated successfully!');
})->name('tasks.toggle-complete');

// Route::get('/tasks/{id}', function ($id) use ($tasks) {
// $task = collect($tasks)->firstWhere('id', $id);

// if (!$task) {
// abort(Response::HTTP_NOT_FOUND);
// }

// return view('show', ['task' => \App\Models\Task::findorFail($id)]);
// })->name('tasks.show');

// Route::get('/', function () {
// return view('welcome');
// return 'Main Page';
// });

// Route::get('/xxx', function () {
// return 'Hello';
// })->name('hello');

// Route::get('/hallo', function () {
// return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
// return 'Hello ' . $name . '!';
// });

// Route::fallback(function () {
// return 'Still got somewhere!';
// });

// GET
// POST
// PUT
// DELETE