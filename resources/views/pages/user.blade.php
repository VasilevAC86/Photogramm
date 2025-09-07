@extends('layouts/main')
@section('title', 'Пользователи PhotoGramm БВ322')
@section('sidebar')
    @include('components/sidebar')
@endsection

@section('content')
    {{$users->links('components/paginate')}}
     @foreach($users as $user)
        @include('components/usercard')
     @endforeach

     {{$users->links('components/paginate')}}
@endsection