<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function() {
    Route::get('/','login');
    Route::get('login','login')->name('login');
    Route::post('login','submit_login')->name('login.submit');
    Route::get("/logout","logout")->name("logout");
});

Route::middleware('auth')->group(function(){
    Route::controller(HomeController::Class)->group(function(){
        Route::get('/home','index')->name('home');
    });
    
    Route::controller(UsersController::class)->group(function(){
        Route::prefix("/users")->name('users.')->group(function(){
            Route::get("/index","index")->name("index");
            Route::get('/get', 'getData')->name('ajax');
            Route::get("/create","create")->name("create");
            Route::post('/store','store')->name('store');
            Route::get("/edit/{id}","edit")->name("edit");
            Route::post("/update/{id}","update")->name("update");
            Route::get("/delete/{id}","destroy")->name("delete");
        });
    });

    Route::controller(RolesController::class)->group(function(){
        Route::prefix("/roles")->name('roles.')->group(function(){
            Route::get("/index","index")->name("index");
            Route::get('/get', 'getData')->name('ajax');
            Route::get("/create","create")->name("create");
            Route::post('/store','store')->name('store');
            Route::get("/edit/{id}","edit")->name("edit");
            Route::post("/update/{id}","update")->name("update");
            Route::get("/delete/{id}","destroy")->name("delete");
        });
    });

});