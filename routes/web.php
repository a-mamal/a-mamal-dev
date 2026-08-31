<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/projects', function () {
    return view('pages.projects');
})->name('projects');

// Articles

Route::get('/articles', [ArticleController::class, 'index'])
    ->name('articles');

Route::get('/articles/{slug}', [ArticleController::class, 'show'])
    ->name('articles.show');


Route::get('/lab', function () {
    return view('pages.lab');
})->name('lab');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/documentation', function () {
    return view('pages.documentation');
})->name('documentation');

Route::get('/documentation/a-mamal-com', function () {
    return view('partials.documentation.a-mamal-com');
})->name('documentation.a-mamal-com');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
