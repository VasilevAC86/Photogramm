<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    function posts(){
        return $this->hasMany(Post::class); // чтобы из зарегистрирванного пользователя запросить список постов
    }

    function followers(){ // связываем подписчиков с пользователем (возвращает подписчиков пользователя)
        return $this->belongsToMany(User::class, 'followings', 'following_id', 'follower-id');
    }
    function followings(){ // возврат тех, на кого подписался пользователь
        return $this->belongsToMany(User::class, 'followings', 'follower-id', 'following_id');
    }
    function notifications(){ // для получения списка уведомлений каждого пользователя
        return $this->hasMany(Notifications::class);
    }    
}
