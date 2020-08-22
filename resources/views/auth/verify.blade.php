@php
$title = 'realOpinion';
$description = '仮登録';
@endphp

@extends('layouts.app')

@section('content')
<div class="verify">
    <div class="container"  style="margin-top: 95px">
        <div class="justify-content-center auth verify-container">
            <div class="heading">
                <h2>会員登録ありがとうございます！</h2>
            </div>
            <div class="message">
                <p>現在、仮会員の状態です。</p>
                <p>ただいま、ご入力頂いたメールアドレス宛に、ご本人様確認用のメールをお送りしました。</p>
                <p>メール本文内のURLをクリックすると本会員登録が完了となります。</p>
            </div>
            <div>
                <a href="{{ route('top') }}" class="btn">トップページへ</a>
            </div>
        </div>
    </div>
</div>
@endsection