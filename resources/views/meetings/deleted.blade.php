@php
$title = 'realOpinion';
$description = '投稿の削除';
@endphp

@extends('layouts.app')

@section('content')
    <div class="meetings-container container">
        <div class="heading">
            <h2>投稿の削除が完了しました</h2>
        </div>
        <div class="return-btn">
            <a href="{{route('opinions')}}">カテゴリページへ戻る</a>
        </div>
    </div>
@endsection

<script>
    $(window).on('load',function(){
        $('#active-category').addClass('active');
    });
</script>