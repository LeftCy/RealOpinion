@php
$title = 'realOpinion';
$description = 'サービスについて';
@endphp

@extends('layouts.app')

@section('content')
    <div class="service-description container">
        <div class="how-service">
            <h1>realOpinionについて</h1>
            <div class="realopinion-description">
                <p>現場で働く「プロ」の「生の声」を聞くことができます。</p>
                <p>伝えてくれる人と伝えて欲しい人を繋げ、相談ができるサービスです。</p>
                <p>相談はコイン１枚（500円）から可能。</p>
                <p>realOpinionはあなたの「知りたい」にコミットできます。</p>
            </div>
        </div>
        <div class="what-coin">
            <h1>コインとは？</h1>
            <div class="coin-description">
                <p>コインはrealOpinion内の通貨で１コイン500円から購入可能です。</p>
                <p>realOpinion内での金銭的なやりとりにはコインを使用します。</p>
            </div>
            <div class="link-btn row">
                <a class="col-sm-5" href="{{ route('coin.index') }}">コインの購入はこちら</a>
            </div>
        </div>
        <div class="flow-of-use">
            <h1>ご利用方法</h1>
            <div class="description-figure row">
                <div class="case-give-opinion col-md-6">
                    <h3>教える場合</h3>
                    <p>自分が持っている知識を求めている人を<a href="{{ route('opinions') }}">カテゴリページ</a>から探す、または<a href="{{ route('give_opinions.create') }}">こちら</a>から募集することができます。</p>
                </div>
                <div class="case-hear-opinion col-md-6">
                    <h3>教わる場合</h3>
                    <p>知りたい情報を<a href="{{ route('opinions') }}">カテゴリページ</a>から探す、または<a href="{{ route('give_opinions.create') }}">こちら</a>から募集することができます。</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(window).on('load',function(){
            $('#active-service').addClass('active');
        });
    </script>
@endsection