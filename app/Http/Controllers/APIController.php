<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; # для получения данных постов
use Illuminate\Support\Facades\Auth; // файл поддержки аутентификации

class APIController extends Controller
{
    public function login(Request $request){
        $credintials = $request->validate([ // данные для авторизации
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(!Auth::attempt($credintials)){ // есди верификация пользователя прошла неуспешно
            return responce()->json(['message' => 'Invalid credentials'], 401);
        }
        $user = Auth::user();
        $token = $user->createToken($credintials['email'])->plainTextToken; // создаём пользователю ключ соединения
        return response()->json(['token' => $token]);
    }
    public function getPosts(){
        $posts = Post::with(['user'])->paginate(2); # переменная-объект, хранящая данные всех постов вместе с данными о пользователях, paginate - это выгрузка части постов (сколько постов на страницу)
        return response()->json($posts); // ответ с постами в формате json
    }
}
