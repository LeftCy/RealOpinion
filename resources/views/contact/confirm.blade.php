@php
$title = 'realOpinion';
$description = '確認';
@endphp

@extends('layouts.app')
@section('content')
<div class="contact-container container">
    <h2>送信内容の確認</h2>
    <h3>以下の内容で送信しますか？</h3>

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf

    <div class="confirm-container">
        <div class="item-container">
            <h4>名前:{{ $inputs['name'] }}</h4>
        </div>
        <div class="item-container">
            <h4>メールアドレス:{{ $inputs['email'] }}</h4>
        </div>
        <div class="item-container">
            <h4>お問い合わせの種類:{{ $inputs['category'] }}</h4>
        </div>
        <div class="item-container text-left">
            <h4>お問い合わせ内容</h4>
            <div class="contact-text-container">
                <p>{{ $inputs['body'] }}</p>
            </div>
        </div>
    </div>

    <div class="contact-submit row">
        <a class="btn contact-back col-md-5" href="javascript:history.back();">入力画面へ戻る</a>
        <button type="submit" name="action" value="submit" class="btn col-md-5">送信</button>
    </div>

    </form>
</div>
    
@endsection