<div class="postcard">
    <img src="/storage/{{$post->url}}" class="postcard-image">
    <div class="postcard-desc">
        <h3>{{$post->text}}</h3>
        <span class="pubdate">Создано: {{$post->created_at}}</span>
        <br />
        <span class="author">Автор: {{$post->user->name}}</span>
        <div class="postcard-comment">
            <h2>Комментарий</h2>
            <form method="post" action="/comment">
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}"/> <!-- скрытый input c id поста, к которому написан комментарий-->
                <textarea name="message" placeholder="Добавить комментарий"></textarea>
                <button class="btn">Отправить</button>
            </form>        
            @foreach($post->comments as $comment)
                <div class="comment">
                    <h4>{{ $comment->user->name }}</h4>
                    <p>{{ $comment->message}}</p>
                    <div class="datetime">
                        {{$comment->created_at}}
                    </div>
                    @if($comment->user->id == auth()->user()->id)
                        <a class="remove-link" href="/delete-comment/{{$comment->id}}">Удалить</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <a href="/like/{{$post->id}}" class="like">
        @if($post->likes->contains('user_id', auth()->user()->id))
            &#9829;
        @else
            &#9825;
        @endif
        <span class="like_count">{{$post->likes->count()}}<span>
    </a>    
</div>
