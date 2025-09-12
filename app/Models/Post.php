<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [ // поля, который заполнены по умолчанию
        'url',
        'text',
        'user_id'
    ];

    public function user(){ // ф. для запроса связанных данных (всё из БД)
        return $this->belongsTo(User::class);
    }
    public function comments(){ // ф. для запроса связанных данных (всё из БД)
        return $this->hasMany(Comment::class);
    }
    public function likes(){ // обратная связь
        return $this->hasMany(Like::class);
    }
}
