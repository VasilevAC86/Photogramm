@extends('layouts/main')
@section('title', 'ЛЕНТА PhotoGramm БВ322')
@section('sidebar')
    @include('components/sidebar')
@endsection

@section('content')
     @foreach($posts as $post)
        @include('components/postcard')
     @endforeach
@endsection