@extends('layouts/main')
@section('title', 'ЛЕНТА PhotoGramm БВ322')
@section('sidebar')
    @include('components/sidebar')
@endsection

@section('content')
    @if(count($posts) == 0) 
        <p>Вы не подписаны ни на одного пользователя</p>
    @endif

    {{$posts->links('components/paginate')}}
     @foreach($posts as $post)
        @include('components/postcard')
     @endforeach

     {{$posts->links('components/paginate')}}
@endsection