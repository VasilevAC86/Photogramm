<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'welcomePage']);
Route::get('/login', [AuthController::class, 'loginPage'])->name('login'); # 
Route::get('/reg', [AuthController::class, 'regPage']); 

Route::post('/reg', [AuthController::class, 'register']); # при action, ссылающемся на /reg, вызывается ф. register
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']); # метод post, чтобы разлогиниться по ссылке

Route::group(['middleware' => ['auth']], function(){ # защищённая группа маршрутов, защищённая middleware (проверка авторизации пользователя)
    Route::get('/lenta', [MainController::class, 'lentaPage']);
    Route::get('/add', [MainController::class, 'addPage']); # отрисовка страницы
    Route::post('/add', [MainController::class, 'add']); # отправка формы (нужно вручную создать add.blade.php в resources/views)
    Route::get('/users', [MainController::class, 'userPage']);
    Route::post('/follow/{id}', [MainController::class, 'follow']);
    Route::post('/unfollow/{id}', [MainController::class, 'unfollow']);
    Route::get('/notification', [MainController::class, 'notifyPage']);
    Route::post('/comment', [MainController::class, 'setComment']);
    Route::get('/delete-comment/{id}', [MainController::class, 'deleteComment']);
    Route::get('/like/{id}', [MainController::class, 'setLike']);
});
