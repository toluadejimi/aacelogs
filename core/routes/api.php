<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;




Route::any('e-fund',  [UserController::class,'e_fund']);
Route::any('e-check',  [UserController::class,'e_check']);



    


