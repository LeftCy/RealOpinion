@php
$title = 'realOpinion';
$description = 'マイページ';
@endphp

@extends('layouts.app')

@section('content')
    <div class="mypage-container container">
        <div class="heading">
            <h2 >マイページ</h2>
        </div>
        <div class="mypage-contents row">
            <div class="col-md-6">
                <div class="box">
                    <div class="heading">
                        <h4>ユーザー情報</h4>
                    </div>
                    <div class="details">
                        <p><span>名前：</span>{{$user->name}}</p>
                        <p><span>メールアドレス：</span>{{$user->email}}</p>
                        <p>
                            <span>平均評価：</span>
                            @switch($user->assessment)
                                @case (1)
                                    {{ '⭐️' }}
                                    @break
                                @case (2)
                                    {{ '⭐️⭐️' }}
                                    @break
                                @case (3)
                                    {{ '⭐️⭐️⭐️' }}
                                    @break
                                @case (4)
                                    {{ '⭐️⭐️⭐️⭐️' }}
                                    @break
                                @case (5)
                                    {{ '⭐️⭐️⭐️⭐️⭐️' }}
                                    @break
                                @default
                                    評価の値が不正です
                            @endswitch
                        </p>
                        <p><span>登録日：</span>{{$user->created_at}}</p>
                    </div>
                </div>
            </div>
            <div class="have-coin col-md-6">
                <div class="box">
                    <div class="heading">
                        <h4>現在コイン枚数</h4>
                    </div>
                    <div class="details">
                        <h5 class="text-center"><span style="color: #7c9701">{{$user->coin}}</span>枚</h5>
                    </div>
                </div>
            </div>
            <div class="messages col-md-12">
                <div class="box">
                    <div class="heading">
                        <h4>受信メッセージ</h4>
                    </div>
                    <div class="details">
                        <!--
                        <a href="{{ route('message.index') }}">テストメッセージ.index</a>
                        <a href="{{ route('message.message') }}">テストメッセージ.message</a>
                        -->
                        <div class="messages-container">
                            <div class="row">
                                <div class="col-2">
                                    <p>From</p>
                                </div>
                                <div class="col-8">
                                    <p>メッセージ</p>
                                </div>
                                <div class="col-1">
                                    <p>返信</p>
                                </div>
                                <div class="col-1">
                                    <p>確認</p>
                                </div>
                                @if ($message_count == 0)
                                    <p>メッセージはありません</p>
                                @else
                                    @foreach ($messages as $message)
                                        <div class="col-2">
                                            <p>{{ $message->name }}</p>
                                        </div>
                                        <div class="col-8 text-left">
                                            <p>{{ $message->msg }}</p>
                                        </div>
                                        <div class="col-1">
                                            <a class="link-btn" href="#">返信</a>
                                        </div>
                                        <div class="col-1">
                                            <form action="{{ route('message.confirm') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $message->id }}" name="id">
                                                <input type="hidden" value="{{ $message->name }}" name="name">
                                                <input type="hidden" value="{{ $message->msg }}" name="msg">
                                                <input type="hidden" value="{{ $message->created_at }}" name="created_at">
                                                <input type="hidden" value="{{ $message->sender_user_id }}" name="sender_user_id">
                                                <button class="link-btn btn" type="submit">確認</button>
                                            </form>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="posts col-md-12">
                <div class="box">
                    <div class="heading">
                        <h4>過去の投稿</h4>
                    </div>
                    <div class="details row container mx-auto">
                        <div class="meetings col-lg-6">
                            <div class="container">
                                <h5>教える</h5>
                                @if ($m_count == 0)
                                    <p>まだ何も投稿していません</p>
                                @else
                                    @foreach ($meetings as $meeting)
                                        <a class="card" href="{{ route('meetings.show', $meeting) }}">
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
                                                <!--  -->
                                                <p class="card-text">カテゴリ:{{$meeting->category->name}}</p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="card-text">
                                                    <small class="text-muted">{{ $meeting->updated_at->diffForHumans() }}に更新されました</small>
                                                </p>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif
                                <div class="btn col-12">
                                    <a class="link-btn teach-btn" href="{{ url('meetings/create') }}">投稿する</a>
                                </div>
                            </div>
                        </div>
                        <div class="give-opinions col-lg-6">
                            <div class="container">
                                <h5>教わる</h5>
                                @if ($g_count == 0)
                                    <p>まだ何も投稿していません</p>
                                @else
                                    @foreach ($give_opinions as $give_opinion)
                                        <a class="card" href="{{ route('give_opinions.show', $give_opinion) }}">
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
                                @endif
                                <div class="btn col-12">
                                    <a class="link-btn teach-btn" href="{{ url('give_opinions/create') }}">投稿する</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection