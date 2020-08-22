@php
$title = 'realOpinion';
$description = 'お問い合わせ';
@endphp

@extends('layouts.app')
@section('content')
<div class="contact-container container">
    <form method="POST" action="{{ route('contact.confirm') }}">
        @csrf

        <h2>お問い合わせ</h2>

        <div class="form-group">
            <label for="name">名前</label>
            <input class="form-control" id="name" type="text" name="name" value="{{ $user_name }}" required placeholder="名前を入力してください" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <p class="error-message">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input class="form-control" id="email" type="text" name="email" value="{{ $user_email }}" placeholder="メールアドレスを入力してください" required>
            @if ($errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="form-category">お問い合わせの種類</label>
            <select class="form-control" name="category" id="form-category" required  value="{{ old('category') }}">
                <option disabled selected value required>選択してください</option>
                <option>「教える、教わる」機能に関するお問い合わせ</option>
                <option>サービスについてのお問い合わせ</option>
                <option>料金に関連する内容のお問い合わせ</option>
                <option>その他のお問い合わせ</option>
            </select>
            @if ($errors->has('category'))
                <p class="error-message">{{ $errors->first('category') }}</p>
            @endif
        </div>

        <div class="form-group">
            <label for="form-body">お問い合わせ内容</label>
            <textarea class="form-control" name="body" id="form-body" cols="30" rows="3" required placeholder="お問い合わせ内容を入力してください">{{ old('body') }}</textarea>
            @if ($errors->has('body'))
                <p class="error-message">{{ $errors->first('body') }}</p>
            @endif
        </div>
        

        <div class="contact-submit">
            <button type="submit" class="btn">送信</button>
        </div>
        
    </form>
</div>
    
@endsection