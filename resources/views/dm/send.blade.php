@php
$title = 'realOpinion';
$description = 'メッセージ';
@endphp

@extends('layouts.app')

@section('content')
    <div class="dm-container container">
        <div class="heading">
            <h2>送信完了</h2>
            <p>メッセージの送信が完了しました！</p>
        </div>
        <div class="contact-description-container">
            <h5>送信先</h5>
            <p>{{ $user_name }}　さん</p>
            <h5>送信内容</h5>
            <p>{{ $input_message }}</p>
            <h5>消費コイン</h5>
            <p>{{ $required_coin }}</p>
        </div>
        <!--
        <div class="btn">
            <div class="link-btn">
                <a href="{{ route('top') }}">トップへ戻る</a>
            </div>
        </div>
        -->
    </div>
@endsection