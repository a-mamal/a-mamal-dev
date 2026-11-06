<?php

use App\Http\Controllers\Api\DocumentationPageController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:sanctum');

Route::get('/projects', [ProjectController::class, 'index']);

// Documentation pages belong to a project, so their URLs start with the project's slug.
Route::get('/projects/{project:slug}/documentation', [DocumentationPageController::class, 'index']);
Route::get('/projects/{project:slug}/documentation/{pageSlug}', [DocumentationPageController::class, 'show']);
