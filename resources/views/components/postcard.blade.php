<div class="postcard">
    <img src="/storage/{{$post->url}}" class="postcard-image">
    <div class="postcard-desc">
        <p>{{$post->text}}</p>
        <span class="pubdate">Создано: {{$post->created_at}}</span>
        <br />
        <span class="author">Автор: {{$post->user->name}}</span>
    </div>
</div>
