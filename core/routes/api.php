<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;




Route::any('e-fund',  'User\UserController@e_fund')->name('e-fund');
Route::any('e-check',  'User\UserController@e_check')->name('e-check');



    


