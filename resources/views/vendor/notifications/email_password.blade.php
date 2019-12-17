@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Oops!')
@else
# @lang('Password Reset!')
@endif
@endif

{{-- Intro Lines --}}
Anda lupa dengan password Anda? Untuk mereset password anda silahkan klik tombol di bawah ini

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
Reset
@endcomponent
@endisset

{{-- Outro Lines --}}
Jika Anda tidak merasa melupakan password Anda, mohon untuk mengabaikan email ini.

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Hormat Kami'),<br>{{ config('app.name') }}
@endif

@endcomponent
