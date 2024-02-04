<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;




Route::any('e_fund',  [UserController::class,'e_fund']);
Route::any('e_check',  [UserController::class,'e_check']);



    


