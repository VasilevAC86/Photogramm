<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; # Подключение класса Auth с методами для авторизации пользователя
use Illuminate\Support\Facades\View;
use App\Models\Post; # Подключаем модель для отправки запросов в БД
use App\Models\User;
use App\Models\Notification;
use App\Services\NotificationService;
use App\Models\Comment;

class MainController extends Controller
{
    public function notifyPage(){
        $notifyNew = Notification::where('user_id', Auth::user()->id)->where('status', 'new')->get(); // Непрочитанные сообщения получить
        $notifyOld = Notification::where('user_id', Auth::user()->id)->where('status', 'old')->get(); // Прочитанные сообщения получить
        $notifyCount = Notification::where('user_id', Auth::user()->id)->where('status', 'new')->count(); /*Кол-во непрочитанных уведомлений */
        View::share('notifyCount', $notifyCount);
        foreach($notifyNew as $notify){
            $notify->status = 'old';
            $notify->save(); // Модель сохраняет поля в БД
        }        
        return view('pages/notify', ['notifyNew' => $notifyNew, 'notifyOld' => $notifyOld]);
    }

    public function userPage(){
        $users = User::whereNotIn('id', [Auth::user()->id])->paginate(6);
        $notifyCount = Notification::where('user_id', Auth::user()->id)->where('status', 'new')->count(); /*Кол-во непрочитанных уведомлений */
        View::share('notifyCount', $notifyCount);
        return view('pages/user', ['users' => $users]);
    }

    public function welcomePage(){
        return view('pages/welcome');
    }

    public function lentaPage(Request $request){
        $page = $request->query('page') ?? 1;
        $notifyCount = Notification::where('user_id', Auth::user()->id)->where('status', 'new')->count(); /*Кол-во непрочитанных уведомлений */
        View::share('notifyCount', $notifyCount);
        /*$posts = Auth::user()->followings()->with(['posts'])->get()->map(
            function($user){
                return $user->posts;
            }
        )->sortBy('created_at')->forPage($page, 6);*/

        //return response()->json($posts);
        /*$posts = Post::with(['user']);
        if($request->input('user')){
            $posts=$posts->where('user_id', $request->input('user'));
        }
        if($request->input('desc')){
            $posts=$posts->orderBy('created_at', 'desc');
        }
        $posts = Post::paginate(6);  // Переменная-коллекция для хранения инф-ии о постах из БД через модель*/

        $followings = Auth::user()->followings()->get()->map(
            function ($user){
                return $user->id;
            }
        );

        $posts = Post::where('user_id', 0)->paginate(6);
        if(count($followings) > 0) {
            $posts = Post::whereIn('user_id', $followings)->paginate(6);
        }            

        //return response()->json($posts);

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

    public function follow($id){
        $user = User::find($id);
        Auth::user()->followings()->attach($user);

        NotificationService::send(Auth::user()->id, "Вы успешно подписались на пользователя " . $user->name);
        NotificationService::send($user->id, "Пользователь " . Auth::user()->name . ' теперь подписан на Вас');
        return back();
    }

    public function unfollow($id){
        $user = User::find($id);
        Auth::user()->followings()->detach($user);
        NotificationService::send(Auth::user()->id, "Вы отписались от пользователя " . $user->name);
        NotificationService::send($user->id, "Пользователь " . Auth::user()->name . ' больше не подписан на Вас');
        return back();    
    }
    public function setComment(Request $request){
        Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $request->input('post_id'),
            'message' => $request->input('message')
        ]);
        return back(); // возвращаем пользователя обратно на страницу
    }
}
