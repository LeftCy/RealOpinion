@php
$title = 'realOpinion';
$description = 'コイン購入';
@endphp

@extends('layouts.app')

@section('content')
    <div class="coin-container container">
        <div class="heading">
            <h2>コイン購入</h2>
        </div>
        <div class="coin-balance">
            <p>現在コイン枚数：<span>{{ $user_coin }}枚</span></p>
        </div>
        <div class="btn-container">
            <div class="buy-coin-btn">購入する</div>
        </div>
        <ul class="coin-message">
            <li>コインは通常、支払い手段に利用します</li>
            <li>コインは１枚500円から購入することができます</li>
            <li>コインの換金率は<a href="#">ユーザーランク</a>に応じて変動します</li>
            <li>ご不満、不明点がありましたら<a href="{{ route('contact.index') }}">お問い合わせフォーム</a>よりお問い合わせください</li>
        </ul>
    </div>

    <!-- Modal -->
    <div id="buy-coin-modal">
        <div class="buy-coin-form container">
            <div class="form-heading">
                <h2>コインの購入</h2>
                <p>購入する枚数を入力してください</p>
            </div>
            <form method="POST" action="{{ route('coin.confirm') }}">
                @csrf
                <div class="form-container">
                    <div class="form-group">
                        <label for="form-body">購入枚数</label>
                        <input class="form-control" id="coin" type="number" name="coin" required min="0" max="99" placeholder="0">
                        <span>枚</span>
                        @if ($errors->has('coin'))
                            <p class="error-message">{{ $errors->first('coin') }}</p>
                        @endif
                    </div>
                </div>

                <div class="contact-submit row">
                    <div id="close-modal" class="btn contact-back col-md-5">キャンセル</div>
                    <button type="submit" name="action" value="sent" class="btn col-md-5">確認画面へ</button>
                </div>
            </form>
        </div>
    </div>
@endsection