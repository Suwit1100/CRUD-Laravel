<?php

use App\Http\Controllers\CRUDfoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/managefood', [CRUDfoodController::class, 'view_manage'])->name('view_manage');
