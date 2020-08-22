@php
$title = 'realOpinion';
$description = 'AllOpinions';
@endphp

@extends('layouts.app')

@section('content')
    <div class="meetings-container container">
    @foreach($meetings as $meeting)
        <div class="meetings">
            <p>名前</p>
            {{$meeting->name}}
            <p>説明</p>
            {{$meeting->description}}
            <p>評価</p>
            {{$meeting->assessment}}
            <p>必要コイン枚数</p>
            {{$meeting->coin}}
            <a href="{{route('meetings.show', $meeting)}}">確認する</a>
            <a href="{{route('meetings.edit', $meeting)}}">編集する</a>
            <form action="/meetings/{{ $meeting->id }}" method="POST" onsubmit="if(confirm('本当に削除しますか?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit">削除する</button>
            </form>
        </div>

        <div class="card">
            <img src="{{ asset($meeting->image) }}" class="card-img-top" alt="ユーザーが登録した画像ファイル">
            <div class="card-body">
                <h5 class="card-title">{{$meeting->name}}</h5>
                <p class="card-text">{{$meeting->description}}</p>
                <p class="card-text">評価{{$meeting->assessment}}</p>
                <p class="card-text">{{$meeting->coin}}枚</p>
                <a href="{{route('meetings.edit', $meeting)}}" class="btn btn-primary">編集する</a>
                <a href="{{route('meetings.show', $meeting)}}" class="btn btn-primary">確認する</a>
                <p class="card-text"><small class="text-muted">３分前に更新されました</small></p>
            </div>
        </div>
    @endforeach
    <a href="{{route('meetings.create')}}">新規登録</a>
    </div>
@endsection