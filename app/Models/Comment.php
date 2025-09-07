<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [ // Какие поля надо заполнить, чтобы создать комментарий
        'user_id',
        'post_id',
        'message'
    ];

    public function user(){ // ф. для запроса связанных данных (всё из БД)
        return $this->belongsTo(User::class);
    }
}
