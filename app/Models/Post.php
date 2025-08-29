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
}
