<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Aqui realizo a criação das rotas da forma solicitada na documentação;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books/create', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
Route::get('/books/{book}/confirm-delete', [BookController::class, 'confirmDelete'])->name('books.confirm-delete');
Route::get('/api/books',[BookController::class, 'getAll']);


// Também e possível ultilizar todas as rotas do projeto juntas, vizando um código menos e mais optimizado;

// desta forma:

//Route::resource('books', BookController::class);
