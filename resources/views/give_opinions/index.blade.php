@php
$title = 'realOpinion';
$description = 'give_opinions';
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
    @foreach($give_opinions as $give_opinion)
        <div class="give_opinions">
            <p>名前</p>
            {{$give_opinion->name}}
            <p>説明</p>
            {{$give_opinion->description}}
            <p>評価</p>
            {{$give_opinion->assessment}}
            <p>必要コイン枚数</p>
            {{$give_opinion->coin}}
            <a href="{{route('give_opinions.show', $give_opinion)}}">確認する</a>
            <a href="{{route('give_opinions.edit', $give_opinion)}}">編集する</a>
            <form action="/give_opinions/{{ $give_opinion->id }}" method="POST" onsubmit="if(confirm('本当に削除しますか?')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit">削除する</button>
            </form>
        </div>

        <div class="card">
            <img src="{{ asset($give_opinion->image) }}" class="card-img-top" alt="ユーザーが登録した画像ファイル">
            <div class="card-body">
                <h5 class="card-title">{{$give_opinion->name}}</h5>
                <p class="card-text">{{$give_opinion->description}}</p>
                <p class="card-text">評価{{$give_opinion->assessment}}</p>
                <p class="card-text">{{$give_opinion->coin}}枚</p>
                <a href="{{route('give_opinions.edit', $give_opinion)}}" class="btn btn-primary">編集する</a>
                <a href="{{route('give_opinions.show', $give_opinion)}}" class="btn btn-primary">確認する</a>
                <p class="card-text"><small class="text-muted">３分前に更新されました</small></p>
            </div>
        </div>
    @endforeach
    <a href="{{route('give_opinions.create')}}">新規登録</a>
    </div>
@endsection