<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController; // Подключаем пространство имён App с контроллером APIController

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); // Ф.-посредник между запросом и обработчиком для обработки запроса перед выполнением его обработчиком

// маршрут для авторизации
Route::post('/login', [APIController::class, 'login']);

// Маршруты для api будут именно в этом файле
Route::get('/lenta', [APIController::class, 'getPosts'])->middleware('auth:sanctum'); // Для получения списка постов, (для загрузки постов был бы post)