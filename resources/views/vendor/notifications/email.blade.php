@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
<b>こんにちは</b>
# @lang('会員登録確認メール')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
{{ config('app.name') }}
@lang('より')
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    ":actionText ボタンが利用できない場合は、以下のURLをコピー＆ペーストしてブラウザから直接アクセスしてください。<br />\n" .
    '[:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
