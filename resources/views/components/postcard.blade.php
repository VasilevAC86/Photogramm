<div class="postcard">
    <img src="/storage/{{$post->url}}" class="postcard-image">
    <div class="postcard-desc">
        <p>{{$post->text}}</p>
        <span class="pubdate">Создано: {{$post->created_at}}</span>
        <br />
        <span class="author">Автор: {{$post->user->name}}</span>
    </div>
    <div class="postcard-comment">
        <form method="post" action="/comment">
            @csrf
            <input type="hidden" name="post_id" value="{{$post->id}}"/> <!-- скрытый input c id поста, к которому написан комментарий-->
            <textarea name="message"></textarea>
            <button class="btn">Отправить</button>
        </form>        
        @foreach($post->comments as $comment)
            <div class="comment">
                <h4>{{ $comment->user->name }}</h4>
                <p>{{ $comment->message}}</p>
                <div class="datetime">
                    {{$comment->created_at}}
                </div>
            </div>
        @endforeach
    </div>
</div>
