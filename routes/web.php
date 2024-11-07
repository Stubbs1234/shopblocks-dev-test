<?php

use App\Http\Controllers\SearchController;
use App\Http\Controllers\OverviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SearchController::class, 'index'])->name('home');
Route::get('/get-pet-breed', [SearchController::class, 'getPetBreeds']);
Route::get('/pet-overview/{id}', [OverviewController::class, 'index']);
