<div class="usercard">
    <img src="/storage/images/default_user.webp" class="usercard_avatar" />
    <div class="usercard_info">
        <h4>{{$user->name}}</h4>
        <span>{{$user->email}}</span>
        @if(auth()->user()->followings()->get()->contains($user->id)) <!--если на пользователя уже подписаны-->
            <form method="post" action="/unfollow/{{$user->id}}">
                @csrf
                <button class="btn">Отписаться</button>
            </form>
        @else
            <form method="post" action="/follow/{{$user->id}}">
                @csrf
                <button class="btn">Подписаться</button>
            </form>
        @endif
    </div>
</div>