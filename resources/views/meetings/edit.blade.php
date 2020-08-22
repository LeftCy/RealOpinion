@php
$title = 'realOpinion';
$description = '会議編集';
@endphp

@extends('layouts.app')

@section('content')
<div class="meetings-container container">
    <h1>投稿内容を編集（教える）</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('meetings.update', $meeting->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="name">タイトル</label>
                <input class="form-control" id="name" type="text" name="name" value="{{ $meeting->name }}" required placeholder="例:プログラミング学習でわからないことはありますか？">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label for="description">説明</label>
                <textarea class="form-control" id="description" name="description" required rows="3" placeholder="タイトルの説明を入力してください">{{ $meeting->description }}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="form_group col-sm-12">
                <label class="row" id="image-label" for="image">メイン画像<br>
                    <div class="image-container center col-md-5">
                        <span>ファイルを選択</span>
                    </div>
                    <div class="image-container col-lg-5">
                        <input class="form-control" id="image" type="file" name="image" value="{{ $meeting->image }}" required>
                    </div>
                </label>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label id="assessment-label" for="assessment">評価</label>
                <input class="form-control" id="assessment" type="number" name="assessment" required min="0" value="{{ $meeting->assessment }}" placeholder="0">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                <label id="coin-label" for="coin">コイン</label>
                <input class="form-control" id="coin" type="number" name="coin" required min="0" max="10" value="{{ $meeting->coin }}" placeholder="0">
                枚
            </div>
        </div>            

        <div class="row">
            <div class="form-group col-sm-12">
                <label for="category_id">カテゴリ</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option disabled selected value required>
                        選択してください
                    </option>
                    @foreach ($categories as $category)
                        @if ($category->id == $meeting->category_id)
                            <option value="{{ $category->id }}" selected>
                                {{ $category->name }}
                            </option>
                        @else
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="contact-submit row">
            <a class="btn contact-back col-md-5" href="javascript:history.back();">戻る</a>
            <button type="submit" class="btn col-md-5">送信</button>
        </div>
    </form>
</div>

<script>
    $(window).on('load',function(){
        $('#active-category').addClass('active');
    });
</script>
@endsection

