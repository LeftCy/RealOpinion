@php
$title = 'realOpinion';
$description = '購入の確認';
@endphp

@extends('layouts.app')

@section('content')
    <div class="coin-container container">
        <div class="heading">
            <h2>購入の確認</h2>
            <p>本当に購入しますか？</p>
        </div>
        <form action="{{ route('coin.send') }}" method="POST">
            @csrf
            <div class="coin-confirm-inputs">
                <!-- コントローラーから渡された値を受け取る -->
                <p>購入枚数:<span>{{ $inputs['coin'] }}</span>枚</p>
                <input type="hidden" value="{{ $inputs['coin'] }}" name="coin">
            </div>
            <div class="btn-container">
                <!--
                <div class="buy-coin-btn">購入する</div>
                -->
                <button type="submit" class="buy-coin-btn">購入する</button>
            </div>
        </form>
    </div>
@endsection