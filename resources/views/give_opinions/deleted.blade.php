@php
$title = 'realOpinion';
$description = '投稿の削除';
@endphp

@extends('layouts.app')

@section('content')
    <div class="give_opinions-container container">
        <div class="heading">
            <h2>投稿の削除が完了しました</h2>
        </div>
        <div class="return-btn row">
            <a class="col-md-5" href="{{route('opinions')}}">カテゴリページへ戻る</a>
        </div>
    </div>
@endsection