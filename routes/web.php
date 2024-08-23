<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::controller(JobController::class)->group(function () {
        Route::get("/","index")->name("jobs.index");
        Route::get("/create","create")->name("jobs.create");
        Route::post("/create","store")->name("jobs.store");

});

Route::controller(RegisteredUserController::class)->group(function () {
        Route::get("/register","create")->name("register.create");
        Route::post("/register","store")->name("register.store");
});

Route::controller(SessionController::class)->group(function () {
        Route::get("/login","create")->name("login.create");
        Route::post("/login","store")->name("login.store");
        Route::delete("/login","destroy")->name("login.destroy")->middleware("auth");
});

Route::get("/search",SearchController::class)->name("search");
Route::get("/tags/{tag:name}",TagController::class)->name("tag");