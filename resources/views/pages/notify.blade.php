@extends('layouts/main')
@section('title', 'ЛЕНТА PhotoGramm БВ322')
@section('sidebar')
    @include('components/sidebar')
@endsection

@section('content')
    <h3>Непрочитанные уведомления</h3>
     @foreach($notifyNew as $notify)        
        <p class="notify notify-new">{{$notify->message}} ({{$notify->created_at}})</p>
     @endforeach
    
    <h3>Остальные уведомления</h3>
     @foreach($notifyOld as $notify)        
        <p class="notify notify-new">{{$notify->message}} ({{$notify->created_at}})</p>
     @endforeach
@endsection