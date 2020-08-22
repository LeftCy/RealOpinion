@php
$title = 'realOpinion';
$description = 'トップページ';
@endphp

@extends('layouts.app')

@section('content')
    <div class="background-container">
        <div class="container heading">
            <div class="jumbotron">
                <div class="heading-messages">
                    <h1>聞きたいこと、伝えたいこと。</h1>
                    <h2>あなたの声が必要です。</h2>
                </div>
                <div class="heading-search-bar">
                    <form action="{{ route('opinions') }}" method="get">
                        <select name="category" id="form-category" required>
                            <option disabled selected value required>カテゴリから検索</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <input type="image" src="{{ asset('images/search.png') }}" name="submit" alt="検索">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="service-about container">
        <div class="container">
            <div class="about row">
                <div class="message col-12 col-md-4">
                    <img class="question-image" src="{{ asset('images/question.svg') }}">
                    <p>realOpinionとは？</p>
                </div>
                <div class="tab-container col-12 col-md-8">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-tell-tab" data-toggle="pill" href="#pills-tell" role="tab" aria-controls="pills-tell" aria-selected="true">伝える</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-taught-tab" data-toggle="pill" href="#pills-taught" role="tab" aria-controls="pills-taught" aria-selected="false">教わる</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-real-tab" data-toggle="pill" href="#pills-real" role="tab" aria-controls="pills-real" aria-selected="false">生の声</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-consultation-tab" data-toggle="pill" href="#pills-consultation" role="tab" aria-controls="pills-consultation" aria-selected="false">相談する</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-tell" role="tabpanel" aria-labelledby="pills-tell-tab">
                            <p>自分にとっては普通の情報でも、他の人にとっては非常に価値のある情報かもしれません。</p>
                            <p>そういった希少価値のある隠れた情報を提供することができます。</p>
                        </div>
                        <div class="tab-pane fade" id="pills-taught" role="tabpanel" aria-labelledby="pills-taught-tab">
                            <p>「ITエンジニアへ転職するために勉強したけど転職できるレベルかどうかわからない。」</p>
                            <p>「製作中、プログラムのエラーにつまずいてしまった。」</p>
                            <p>「他業界に行きたいけど実際のところどうなのか不安。」</p>
                            <p>そういった悩みの解決の糸口を現場のプロに相談することができます。</p>
                        </div>
                        <div class="tab-pane fade" id="pills-real" role="tabpanel" aria-labelledby="pills-real-tab">
                            <p>インターネットにはたくさんの情報が溢れていて非常に便利です。</p>
                            <p>しかし、それらの情報を発信しているのも一個人です。</p>
                            <p>たくさんの情報の中で何が答えなのかわからないこともあります。</p>
                            <p>realOpinion得られる情報はきっとあなたの求める答えに近いでしょう。</p>
                        </div>
                        <div class="tab-pane fade" id="pills-consultation" role="tabpanel" aria-labelledby="pills-consultation-tab">
                            <p>貴方は大きい決断を迫られる時があるはずです。</p>
                            <p>「失敗したくないけど、相談する相手がいない。」</p>
                            <p>realOpinionはそんな貴方にぴったりのサービスです。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="advertising-parts container">
        <div class="container">
            <div class="about-service-container row">
                <div class="about-service col-sm">
                    <div class="feature">ワンコインから手軽に相談できる</div>
                    <p>ご利用は最安で５００円からすることができます。</p>
                </div>
                <div class="about-service col-sm">
                    <div class="feature">価値のある情報を共有できる</div>
                    <p>あなたの声や意見は世界中のどこを探してもあなたにしかありません。</p>
                </div>
                <div class="about-service col-sm">
                    <div class="feature">特別な準備は必要なし</div>
                    <p>インターネットにつながったPCやスマートフォンがあればいつでも、いつでも利用可能です。</p>
                </div>
            </div>
            <div class="btn link-btn-container">
                <a class="link-btn" href="{{ route('register') }}">今すぐ登録する</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="hear-opinion">
            <h2>新着の投稿はこちら</h2>
            <div class="card-deck">
                @foreach ($meetings as $meeting)
                <a class="card fade-up" href="{{ route('meetings.show', $meeting) }}">
                    <img src="{{asset($meeting->image)}}" class="card-img-top" alt="ユーザーが登録した画像ファイル">
                    <div class="card-body">
                        <h5 class="card-title">{{$meeting->name}}</h5>
                        @switch($meeting->assessment)
                            @case (1)
                                <p>評価: {{ '⭐️' }}</p>
                                @break
                            @case (2)
                                <p>評価: {{ '⭐️⭐️' }}</p>
                                @break
                            @case (3)
                                <p>評価: {{ '⭐️⭐️⭐️' }}</p>
                                @break
                            @case (4)
                                <p>評価: {{ '⭐️⭐️⭐️⭐️' }}</p>
                                @break
                            @case (5)
                                <p>評価: {{ '⭐️⭐️⭐️⭐️⭐️' }}</p>
                                @break
                            @default
                                <p>評価の値が不正です</p>
                        @endswitch
                        <p class="card-text">コイン: {{$meeting->coin}}枚</p>
                        <p class="card-text">カテゴリ:{{$meeting->category->name}}</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text">
                            <small class="text-muted">{{ $meeting->updated_at->diffForHumans() }}に更新されました</small>
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="give-opinion">
            <h2>あなたの助けを待っている人がいます</h2>
            <div class="card-deck">
                @foreach ($give_opinions as $give_opinion)
                <a class="card fade-up" href="{{ route('give_opinions.show', $give_opinion) }}">
                    <img src="{{asset($give_opinion->image)}}" class="card-img-top" alt="ユーザーが登録した画像ファイル">
                    <div class="card-body">
                        <h5 class="card-title">{{$give_opinion->name}}</h5>
                        @switch($give_opinion->assessment)
                            @case (1)
                                <p>評価: {{ '⭐️' }}</p>
                                @break
                            @case (2)
                                <p>評価: {{ '⭐️⭐️' }}</p>
                                @break
                            @case (3)
                                <p>評価: {{ '⭐️⭐️⭐️' }}</p>
                                @break
                            @case (4)
                                <p>評価: {{ '⭐️⭐️⭐️⭐️' }}</p>
                                @break
                            @case (5)
                                <p>評価: {{ '⭐️⭐️⭐️⭐️⭐️' }}</p>
                                @break
                            @default
                                <p>評価の値が不正です</p>
                        @endswitch
                        <p class="card-text">コイン: {{$give_opinion->coin}}枚</p>
                        <!--  -->
                        <p class="card-text">カテゴリ:{{$give_opinion->category->name}}</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text">
                            <small class="text-muted">{{ $give_opinion->updated_at->diffForHumans() }}に更新されました</small>
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
    
    <script>
    $(window).on('load',function(){
        $('#active-top').addClass('active');
    });
    </script>
@endsection