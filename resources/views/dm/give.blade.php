@php
$title = 'realOpinion';
$description = 'メッセージ';
@endphp

@extends('layouts.app')

@section('content')
    <div class="dm-container container">
        <div id="contact-message">
            <div class="contact-form container">
                <div class="form-heading">
                    <h2>連絡する</h2>
                    <p>提供できる知識や連絡先などを相手に伝えましょう！</p>
                </div>
                <div class="form-container">
                    <form name="textarea">
                        <div class="form-group">
                            <label for="form-body">{{ $user_name }}　さんへの連絡内容</label>
                            <textarea class="form-control" name="body" id="form-body" value="1" cols="10" rows="5" required placeholder="相談内容をこちらに入力してください">{{ old('body') }}</textarea>
                        </div>

                        <div class="required-coin row">
                            <div class="message col-md-5">
                                <p>獲得コイン数：<span>{{ $required_coin }}枚</span></p>
                            </div>
                        </div>
            
                        <div class="contact-submit row">
                            <div class="btn page-back close-modal contact-back col-md-5">キャンセル</div>
                            <div id="close-open-modal" class="btn col-md-5">入力内容の確認</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="contact-confirm-modal">
            <div class="contact-confirm-form container">
                <div class="form-heading">
                    <h2>連絡する</h2>
                    <p>以下のコインを獲得できます</p>
                </div>
                <div class="required-coin row">
                    <div class="message col-md-5">
                        <p>獲得コイン数：<span>{{ $required_coin }}枚</span></p>
                    </div>
                </div>
                <form action="{{ route('dm.giveSend') }}" method="POST">
                    {{ csrf_field() }}
                    <label for="input-container">相談内容</label>
                    <div id="input-container" class="input-container">
                        <p id="input-message"></p>
                        
                    </div>
                    <div class="contact-submit row">
                        <p>以下の内容で送信しますか？</p>
                        <div class="btn close-modal contact-back col-md-5">キャンセル</div>
                        <input type="hidden" value="" id="message-target" name="body">
                        <input type="hidden" value="{{ $user_name }}" id="username-target" name="user_name">
                        <input type="hidden" value="{{ $required_coin }}" id="requiredcoin-target" name="required_coin">
                        <input type="hidden" value="{{ $user_id }}" name="user_id">
                        <!-- <div id="close-open-modal" class="btn col-md-5">送信する</div> -->
                        <button type="submit" class="btn col-md-5">送信する</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="warning-modal">
            <div class="warning-message container">
                <div class="warning-heading">
                    <h2>注意</h2>
                    <p><span>持っているコインが不足しています</span></p>
                </div>
                <div class="have-coin-container">
                    <h5>保有コイン枚数</h5>
                    <p>{{ $my_user_coin }}枚</p>
                </div>
                <div class="btn col-4 mx-auto">
                    <a href="{{ url('/coin/balance') }}" class="link-btn">コインを購入する</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        var coin_judgment = true;
    </script>
@endsection