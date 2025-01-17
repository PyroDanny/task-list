<?php
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::get('/tasks', function (){
    return view('index', [
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');


Route::view('tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
      'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
      'task' => $task
    ]);
})->name('tasks.show');


Route::post('/tasks', function(TaskRequest $request) {
    // $data = $request->validated();
    // $task = new Task;
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully');
})->name('tasks.store');

Route::put('/tasks/{task}', function(Task $task, TaskRequest $request) {
    // $data = $request->validated();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];

    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully');
})->name('tasks.update');

Route::delete('/tasks/{task}', function(Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully');
})->name('tasks.destroy');

// Route::get('/hello', function () {
//     return 'Hello';
// })->name('hello');

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });


// Route::get('/greet/{name}', function ($name) {
//     return 'Hello, ' . $name;
// });

Route::fallback(function () {
    return 'still got somewhere.... but not where you wanted!';
});