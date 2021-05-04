<?php

use Illuminate\Support\Facades\Route;
use AmoryTraore\Actualite\Http\Controllers\ActualitesController;
use AmoryTraore\Actualite\Http\Controllers\CategoryController;

Route::get('actualite', [ActualitesController::class, 'index'])->name('actualite');
//Route::post('actualite/add', [ActualitesController::class, 'store']);
Route::put('actualite/edit/{id}', [ActualitesController::class, 'update'])->name('edit-actualite');
Route::delete('actualite/delete/{id}', [ActualitesController::class, 'delete'])->name('delete-actualite');
Route::post('actualite/store', [ActualitesController::class, 'store'])->name('add-actualite');
Route::get('actualite/{id}', [ActualitesController::class, 'show']);

Route::get('categorie', [CategoryController::class, 'index'])->name('categorie');
Route::post('categorie/store', [CategoryController::class, 'store'])->name('add-categorie');
Route::put('categorie/edit/{id}', [CategoryController::class, 'update'])->name('edit-categorie');
Route::delete('categorie/delete/{id}', [CategoryController::class, 'delete'])->name('delete-categorie');
