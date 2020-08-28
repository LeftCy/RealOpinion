@php
$title = 'realOpinion';
$description = 'GiveOpinion';
@endphp

@extends('layouts.app')

@section('content')
<div class="give-opinion-show">
    <div class="container show">
        <div class="row">
            <!-- hrefの値には対応するカテゴリへのリンクを貼ること。 -->
            <div class="category-link col-12">
                <a href="{{ route('opinions', ['category' => $giveOpinion->category->id]) }}"><span>カテゴリ: </span>{{$giveOpinion->category->name}}</a>
            </div>
            <div class="assessment-box col-12">
                @switch($giveOpinion->assessment)
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
            <div class="title-box col-12">
                <h1>{{$giveOpinion->name}}</h1>
            </div>
            <div class="image-box col-lg-5">
                <img src="{{asset($giveOpinion->image)}}" class="card-img-top" alt="ユーザーが登録した画像ファイル">
            </div>
            <div class="message-contents col-lg-7">
                <div class="discription-message">
                    <h3>相談したいこと</h3>
                    <div class="detail-description container">
                        <p>{{ $giveOpinion->description }}</p>
                    </div>
                    <h3>コイン</h3>
                    <div class="detail-description container">
                        <p>{{$giveOpinion->coin}}枚</p>
                    </div>
                </div>
                <div class="contact-btn">
                    @if (Auth::id() == $giveOpinion->user_id)
                        <a class="edit-link-btn" href="{{ route('give_opinions.edit', $giveOpinion) }}">この投稿を編集する</a>
                        <div class="delete-btn">この投稿を削除する</div>
                    @else
                        <form action="{{ route('dm.give') }}" method="get">
                            <input type="hidden" value="{{ $giveOpinion->user_id }}" name="user">
                            <input type="hidden" value="meetings" name="opinion_type">
                            <input type="hidden" value="{{ $giveOpinion->id }}" name="opinion_id">
                            <input type="hidden" value="{{ $giveOpinion->coin }}" name="coin">
                            <button type="submit" class="btn contact-link-btn">いますぐ連絡する！</button>
                        </form>
                        <!-- <div class="contact-link-btn">今すぐ相談に乗る！</div> -->
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
        <form>
            @csrf
            <div class="form-group">
                <label for="form-body">相談内容</label>
                <textarea class="form-control" name="body" id="form-body" cols="10" rows="5" required placeholder="相談内容をこちらに入力してください">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                    <p class="error-message">{{ $errors->first('body') }}</p>
                @endif
            </div>

            <div class="contact-submit row">
                <div class="close-modal btn contact-back col-md-5">キャンセル</div>
                <button type="submit" name="action" value="submit" class="btn col-md-5">送信</button>
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
        <!--
        
        -->
        <form method="POST" action="/give_opinions/delete/{{$giveOpinion->id}}">
            @csrf
            <div class="contact-submit row">
                <div class="close-modal btn contact-back col-md-5">キャンセル</div>
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

