<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/books', [BookController::class, 'index']); //Список книг
Route::get('/books/create', [BookController::class, 'create']); //Форма создания книги
Route::post('/books', [BookController::class, 'store']); //Сохранение книги
Route::get('books/{id}/edit}', [BookController::class, 'edit']); //Редактирование книги
Route::patch('books/{id}', [BookController::class, 'update']); //Обновление книги
Route::delete('books/{id}', [BookController::class, 'destroy']); //Удаление книги
