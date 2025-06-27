<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/tasks');
});

Route::middleware(['auth'])->group(function () {

    // 📝 Routes pour gestion de tâches
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::get('/tasks/create', [TaskController::class, 'create']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/{id}', [TaskController::class, 'show']);
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
    Route::patch('/tasks/{id}', [TaskController::class, 'markAsCompleted']);

});

//  Route utilisée automatiquement par Breeze
Route::get('/dashboard', function () {
    return redirect('/tasks'); // ou ->view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
