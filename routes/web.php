<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\TaskController;



Route::resource('tasks', TaskController::class);
