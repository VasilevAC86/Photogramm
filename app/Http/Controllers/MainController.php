<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; # Подключение класса Auth с методами для авторизации пользователя
use App\Models\Post; # Подключаем модель для отправки запросов в БД

class MainController extends Controller
{
    public function welcomePage(){
        return view('pages/welcome');
    }
    public function lentaPage(){
        $posts = Post::paginate(1); // Переменная-коллекция для хранения инф-ии о постах из БД через модель

        return view("pages/lenta", ['posts' => $posts]);
    }
    public function addPage(){
        return view("pages/add"); # отрисовка страницы
    }
    public function add(Request $request){ # Request - объект для проверок (валидация данных)
        $validated = $request->validate([
            'foto' => 'required', # чтобы было просто заполнено
            'text' => 'max:1000'
        ]);

        # Записываем имя файла в БД
        $user = Auth::user();
        $file = $request->file('foto'); # объект, в котором содержатся данные о файле из input с именем foto
        $filename = hash("md5", microtime()) . "_" . $user->id . '.' . $file->getClientOriginalExtension(); # . - это конкатенация, получаем уникальное имя файла для БД из 3-ёх чатей: хеш-код от текущего времени + id пользователя + расширение файла
        Post::create([ // Запись в БД через файл модели Post
            'url' => 'uploads/'.$filename,
            'user_id' => $user->id,
            'text' => $validated['text']
        ]); 
        
        $file->storePubliclyAs('uploads', $filename, 'public'); // Сохраняем файл из временного массива в папку storage/app/public/uploads в папке проекта

        return redirect('/lenta');
    }
}
