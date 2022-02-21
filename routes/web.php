<?php

use App\Http\Controllers\DeleteQuestionImageController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SkinSightController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::view('/', 'welcome');

Route::controller(SkinSightController::class)->group(function () {
    Route::get('skinsight', 'index');
    Route::post('skinsight', 'store');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
    return Inertia::render('About');
})->middleware(['auth'])->name('about');


Route::middleware(['auth', 'role:admin|superadmin'])
    ->name('admin.')
    ->group(function () {
        Route::controller(QuizController::class)->group(function () {
            Route::get('quiz', 'index')->name('quiz.index');
            Route::get('quiz/{question}', 'edit')->name('quiz.edit');
            Route::put('quiz/{question}', 'update')->name('quiz.update');
        });
        Route::post('quiz/{question}', DeleteQuestionImageController::class)->name('quiz.delete_image');
    });
