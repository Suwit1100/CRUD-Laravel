<?php

use App\Http\Controllers\CRUDfoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/managefood', [CRUDfoodController::class, 'view_manage'])->name('view_manage');
Route::post('/addfood', [CRUDfoodController::class, 'add_food'])->name('add_food');
Route::get('/editfood/{id}', [CRUDfoodController::class, 'edit_data'])->name('edit_data');
Route::post('/updatedata', [CRUDfoodController::class, 'update_data'])->name('update_data');
Route::get('/delete/{id}', [CRUDfoodController::class, 'delete'])->name('delete');
