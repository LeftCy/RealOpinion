@php
$title = 'realOpinion';
$description = 'メッセージ';
@endphp

@extends('layouts.app')

@section('content')
    <div class="message-container container">
        <div class="heading">
            <h2>メッセージ</h2>
        </div>
        <div class="message">
            <div class="s_name">
                送信者：{{ $s_name }}
            </div>
            <div class="r_name">
                受信者：{{ $r_name }}
            </div>
            <div class="created_at">
                受信日時：{{ $created_at }}
            </div>
            <div class="s_name">
                メッセージ：{{ $msg }}
            </div>
        </div>
        <div class="btn">
            <a href="/mypage" class="link-btn left">戻る</a>
            <!--
            <a href="#" class="link-btn">返信する</a>
            -->
            <form action="#" method="POST">
                @csrf
                <input type="hidden" value="{{ $message_id }}" name="id">
                <button class="link-btn btn" type="submit">返信する</button>
            </form>
        </div>
    </div>
@endsection