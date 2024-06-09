<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;

Route::resource('produto', ProdutoController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produto/{name?}', function ($name = null) {
    return view('produto', ['produto' =>$name]);
});

Route::get('/listaproduto/{name?}', function ($name =null){
    return view('listaproduto', ['lista'=>$name]);
});