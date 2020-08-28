@php
$title = 'realOpinion';
$description = '新規登録';
@endphp

@extends('layouts.app')

@section('content')
    <div class="meetings-container container">
        <h1>教えたいことを投稿する</h1>
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
        <form method="POST" action="/meetings" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="name">タイトル</label>
                    <input class="form-control" id="name" type="text" name="name" required placeholder="例:プログラミング学習でわからないことはありますか？">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="description">説明</label>
                    <textarea class="form-control" id="description" name="description" required rows="3" placeholder="タイトルの説明を入力してください"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="form_group col-sm-12">
                    <label class="row" id="image-label" for="image">メイン画像<br>
                        <div class="image-container center col-md-5">
                            <span>ファイルを選択</span>
                        </div>
                        <div class="image-container col-lg-5">
                            <input class="form-control" id="image" type="file" name="image" required>
                        </div>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12">
                    <label id="coin-label" for="coin">コイン</label>
                    <input class="form-control" id="coin" type="number" name="coin" required min="0" max="10" placeholder="0">
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
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <input id="assessment" type="hidden" name="assessment" value="{{ $user_assessment }}">

            <div class="submit-buttom row">
                <button type="submit" class="btn col-sm-6 align-self-center">投稿する</button>
            </div>
        </form>
    </div>
@endsection