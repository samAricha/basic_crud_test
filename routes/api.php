<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// returns  a page with all tests
Route::get('/',[TestsController::class .'index'])->name('tests.index');
// returns the form for adding a test
Route::get('/tests/create',[TestsController::class, 'create'])->name('tests.create');
// adds a task to the database
Route::post('/tests', [TaskController::class, 'store'])->name('tests.store');
// returns a page that shows a full test
Route::get('/tests/{task}', [TestsController::class, 'show'])->name('tests.show');
// returns the form for editing a test
Route::get('/tests/{task}/edit', [TestsController::class, 'edit'])->name('tests.edit');
// updates a test
Route::put('/tests/{task}', [TestsController::class, 'update'])->name('tests.update');
// deletes a test
Route::delete('/tests/{task}', [TestsController::class, 'destroy'])->name('tests.destroy');
