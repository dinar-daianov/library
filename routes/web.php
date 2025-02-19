<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/create', [BookController::class, 'create']); //Форма создания книги
Route::post('/books', [BookController::class, 'store']); //Сохранение книги
Route::get('books/{id}/edit}', [BookController::class, 'edit']); //Редактирование книги
Route::patch('books/{id}', [BookController::class, 'update']); //Обновление книги
Route::delete('books/{id}', [BookController::class, 'destroy']); //Удаление книги
Route::resource('books', BookController::class);

Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/create', [AuthorController::class, 'create']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::get('authors/{id}/edit', [AuthorController::class, 'edit']);
Route::patch('authors/{id}', [AuthorController::class, 'update']);
Route::delete('authors/{id}', [AuthorController::class, 'destroy']);
Route::resource('authors', AuthorController::class);
