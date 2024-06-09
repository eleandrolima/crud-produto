<?php

use App\Http\Controllers\Admin\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');
Route::get('/produto/create', [ProdutoController::class, 'create'])->name('produto.create');
Route::post('/produto/store', [ProdutoController::class, 'store'])->name('produto.store');
Route::get('/produto/show/{id}', [ProdutoController::class, 'show'])->name('produto.show');
Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit'])->name('produto.edit');
Route::put('/produto/update/{id}', [ProdutoController::class, 'update'])->name('produto.update');
Route::delete('/produto/destroy/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');