@php
$title = 'realOpinion';
$description = '教える、教わる';
@endphp

@extends('layouts.app')
@section('content')
<div class="teach container">
    <div class="teach-message">
        <h2>持っている知識を教える</h2>
        <p>多種多様な知識のなかで求められるニーズは様々です。</p>
        <p>あなたの知識を必要とする人に届ける事ができます。</p>
        <div class="btn teach-btn col-4">
            <a class="link-btn teach-btn" href="{{ url('meetings/create') }}">今すぐ教える！</a>
        </div>
    </div>
    
    <div class="teach-message">
        <h2>知りたいことを教えてもらう</h2>
        <p>普通なら聞く事が難しい「現場の声」や「業界知識」などを手ごろな料金で質問・相談する事ができます。</p>
        <p>あなたが聞きたい情報を募集することで教えてくれる人がきっと見つかります。</p>
        <div class="btn teach-btn col-4">
            <a class="link-btn teach-btn" href="{{ url('give_opinions/create') }}">今すぐ教えてもらう！</a>
        </div>
    </div>
    
</div>
<script>
    $(window).on('load',function(){
        $('#active-teach').addClass('active');
    });
    </script>
@endsection