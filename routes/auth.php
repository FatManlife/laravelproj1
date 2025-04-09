<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get("/login", [AuthController::class, "login_view"])->name("login.view");
Route::post("/login", [AuthController::class, "login_action"])->name("login.action");

Route::get("/register", [AuthController::class, "register_view"])->name("register.view");
Route::post("/register", [AuthController::class, "register_action"])->name("register.action");

Route::post("/logout", [AuthController::class, "logout_action"])->name("logout.action");
