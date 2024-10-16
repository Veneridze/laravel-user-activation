<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Veneridze\LaravelUserActivation\Middleware\UserDeactivated;

//Route::middleware('guest')->group(function () {
//    Route::get('activation/{user:activation_key}', function(User $user) {
//        
//    })->middleware(UserDeactivated::class);
//    Route::post('activation/{user:activation_key}', function(User $user) {
//        //$user
//    })->middleware(UserDeactivated::class);
//});
