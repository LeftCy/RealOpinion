@php
$title = 'realOpinion';
$description = 'コイン購入';
@endphp

@extends('layouts.app')

@section('content')
    <div class="coin-container container">
        <div class="heading">
            <h2>購入完了</h2>
            <p>ご購入ありがとうございました！</p>
        </div>
        <div class="coin-balance">
            <p>購入枚数:<span>{{ $inputs['coin'] }}</span>枚</p>
            <p>↓</p>
            <p>現在の枚数:<span>{{ $user_coin }}</span>枚</p>
        </div>
        
        <div class="btn-container">
            <a class="return-top-btn" href="{{ url('top') }}">トップへ戻る</a>
        </div>
    </div>
@endsection