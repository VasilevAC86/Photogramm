<a href="/lenta">Главная</a>
<a href="/profile">Профиль</a>
<a href="/users">Пользователи</a>
<a href="/notification">
    Уведомления
    @if($notifyCount > 0)
        <div class="bage">
            {{$notifyCount}}
        </div>
    @endif
</a>
<a href="/settings">Настройки</a>