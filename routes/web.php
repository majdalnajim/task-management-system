<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\TestController;


Route::get('/add-task', [TestController::class,'store']);
Route::get('/delete-task/{id}', [TestController::class,'delete']);
Route::get('/update-task/{id}', [TestController::class,'update']);
Route::get('/form', [TestController::class,'showForm']);
