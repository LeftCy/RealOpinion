@php
$title = 'realOpinion';
$description = 'meetings';
@endphp

@extends('layouts.app')

@section('content')
<div class="meeting-show">
    <div class="container show">
        <div class="row">
            <div class="category-link col-12">
                <!-- hrefの値には対応するカテゴリへのリンクを貼ること。 -->
                <a href="{{ route('opinions', ['category' => $meeting->category->id]) }}"><span>カテゴリ: </span>{{$meeting->category->name}}</a>
            </div>
            <div class="assessment-box col-12">
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
            </div>

            <div class="contributor-box col-12">
                <p>投稿者:{{ $user_name }}</p>
            </div>

            <div class="title-box col-12">
                <h1>{{$meeting->name}}</h1>
            </div>
            <div class="image-box col-lg-5">
                <img src="{{asset($meeting->image)}}" class="card-img-top" alt="ユーザーが登録した画像ファイル">
            </div>
            <div class="message-contents col-lg-7">
                <div class="discription-message">
                    <h3>相談したいこと</h3>
                    <div class="detail-description container">
                        <p>{{ $meeting->description }}</p>
                    </div>
                    <h3>コイン</h3>
                    <div class="detail-description container">
                        <p>{{$meeting->coin}}枚</p>
                    </div>
                </div>
                <div class="contact-btn">
                    @if (Auth::id() == $meeting->user_id)
                        <a class="edit-link-btn" href="{{ route('meetings.edit', $meeting) }}">この投稿を編集する</a>
                        <div class="delete-btn">この投稿を削除する</div>
                    @else
                    <form action="{{ route('dm') }}" method="get">
                            <input type="hidden" value="{{ $meeting->user_id }}" name="user">
                            <input type="hidden" value="meetings" name="opinion_type">
                            <input type="hidden" value="{{ $meeting->id }}" name="opinion_id">
                            <input type="hidden" value="{{ $meeting->coin }}" name="coin">
                            <button type="submit" class="btn contact-link-btn">いますぐ相談する！</button>
                        </form>
                        <!-- <div class="contact-link-btn">いますぐ相談する！</div> -->
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
  
<!-- Modal -->
<div id="contact-modal">
    <div class="contact-form container">
        <div class="form-heading">
            <h2>相談する</h2>
            <p>相談したいことや用件をここに記入しましょう！</p>
        </div>
        <div class="form-container">
            <div class="required-coin row">
                <div class="message col-md-5">
                    <p>必要コイン数：<span>{{ $meeting->coin }}枚</span></p>
                </div>
            </div>
            <form name="textarea">
                <div class="form-group">
                    <label for="form-body">相談内容</label>
                    <textarea class="form-control" name="body" id="form-body" value="1" cols="10" rows="5" required placeholder="相談内容をこちらに入力してください">{{ old('body') }}</textarea>
                </div>
    
                <div class="contact-submit row">
                    <div class="btn close-modal contact-back col-md-5">キャンセル</div>
                    <div id="close-open-modal" class="btn col-md-5">入力内容の確認</div>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="contact-confirm-modal">
    <div class="contact-confirm-form container">
        <div class="form-heading">
            <h2>相談する</h2>
            <p>以下の内容で送信しますか？</p>
        </div>
        <form action="">
            <label for="input-container">相談内容</label>
            <div id="input-container" class="input-container">
                <p id="input-message"></p>
            </div>
            <div class="contact-submit row">
                <div class="btn close-modal contact-back col-md-5">キャンセル</div>
                <div id="close-open-modal" class="btn col-md-5">送信する</div>
                <button type="submit" class="btn col-md-5">送信する</button>
            </div>
        </form>
    </div>
</div>

<div id="delete-modal">
    <div class="delete-form container">
        <div class="form-heading">
            <h2>削除</h2>
            <p>本当に削除しますか？</p>
        </div>
        <form method="POST" action="{{ route('meetings.destroy', ['meeting' => $meeting]) }}">
            @csrf
            @method('DELETE')
            <div class="contact-submit row">
                <div class="btn close-modal contact-back col-md-5">キャンセル</div>
                <button type="submit" name="action" value="delete" class="btn col-md-5">削除する</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(window).on('load',function(){
        $('#active-category').addClass('active');
    });
</script>
@endsection

