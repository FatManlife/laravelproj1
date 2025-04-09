<?php

use App\Http\Controllers\PostController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::get(
    "/posts",
    [PostController::class, 'index']
)->name("posts.index.view");

Route::get(
    "/posts/create",
    [PostController::class, 'create']
)->name("posts.create.view");

Route::middleware([AuthMiddleware::class])->post(
    "/posts",
    [PostController::class, 'store']
)->name("posts.store.action");

Route::get(
    "/posts/{id}",
    [PostController::class, 'show']
)->name("posts.show.view");

Route::get(
    "/posts/{id}/edit",
    [PostController::class, 'edit']
)->name("posts.edit.view");

Route::middleware([AuthMiddleware::class])->put(
    "/posts",
    [PostController::class, 'update']
)->name("posts.update.action");

Route::middleware([AuthMiddleware::class])->delete(
    "/posts/{id}",
    [PostController::class, 'destroy']
)->name("posts.destroy.action");
