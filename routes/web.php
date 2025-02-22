<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/create', [BookController::class, 'create']); // Форма создания книги
Route::post('/books', [BookController::class, 'store']); // Сохранение книги
Route::get('books/{id}/edit', [BookController::class, 'edit'])->name('books.edit'); // Редактирование книги
Route::put('books/{id}', [BookController::class, 'update']); // Обновление книги
Route::delete('books/{id}', [BookController::class, 'destroy'])->name('books.update'); // Удаление книги
Route::resource('books', BookController::class);

Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/create', [AuthorController::class, 'create']);
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
Route::get('authors/{id}/edit', [AuthorController::class, 'edit']);
Route::patch('authors/{id}', [AuthorController::class, 'update']);
Route::delete('authors/{id}', [AuthorController::class, 'destroy']);
Route::resource('authors', AuthorController::class);

require __DIR__.'/auth.php';
