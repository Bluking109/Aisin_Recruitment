@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Oops!')
@else
# @lang('Selemat datang!')
@endif
@endif

{{-- Intro Lines --}}
Untuk melanjutkan proses lamaran Anda di PT. Aisin Indonesia Automotive, tekan tombol di bawah untuk memverifikasi e-mail Anda

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
Verifikasi
@endcomponent
@endisset

{{-- Outro Lines --}}
Jika Anda tidak merasa mendaftarkan email ini di halaman web Kami, mohon untuk mengabaikan email ini.

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Hormat Kami'),<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@slot('subcopy')
@lang(
    "Jika Anda tidak dapat menekan tombol \":actionText\" di atas, copy paste url berikut ini\n".
    'ke web browser Anda: [:actionURL](:actionURL)',
    [
        'actionText' => 'Verifikasi',
        'actionURL' => $actionUrl,
    ]
)
@endslot
@endcomponent
