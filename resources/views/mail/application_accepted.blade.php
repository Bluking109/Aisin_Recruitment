@component('mail::message')
{{-- Greeting --}}
# @lang('Hai '. $application->jobSeeker->name)
@php
$applicationStages = $application->jobApplicationStages;
$stageBefore = null;
if ($applicationStages->count() > 1) {
	$stageBefore = $applicationStages[$applicationStages->count() - 2];
	$stageBeforeName = $stageBefore->stage->name;
} else {
	$stageBeforeName = 'Seleksi Dokumen';
}

$stageAfter = $applicationStages[$applicationStages->count() - 1];
$stageAfterName = $stageAfter->stage->name;

$day = date('D', strtotime($stageAfter->exam_at));
$date = date('d F Y', strtotime($stageAfter->exam_at));
$time = date('H:i', strtotime($stageAfter->exam_at));

switch($day){
	case 'Sun':
		$today = "Minggu";
	break;

	case 'Mon':
		$today = "Senin";
	break;

	case 'Tue':
		$today = "Selasa";
	break;

	case 'Wed':
		$today = "Rabu";
	break;

	case 'Thu':
		$today = "Kamis";
	break;

	case 'Fri':
		$today = "Jumat";
	break;

	case 'Sat':
		$today = "Sabtu";
	break;

	default:
		$today = "Tidak di ketahui";
	break;
}

@endphp
<br>
Selamat hasil {{ $stageBeforeName }} Anda lolos, bersama ini PT Aisin Indonesia Automotive mengundang Anda untuk mengikuti proses berikutnya yaitu {{ $stageAfterName }} pada <b>{{ $today }}, {{ $date }} pukul {{ $time }}</b>, bertempat di :
<br>

@if($vendor = $stageAfter->vendor)
{{ $vendor->name }}
@else
PT. Aisin Indonesia Automotive
@endif
<br>
@if($vendor = $stageAfter->vendor)
{{ $vendor->address }}
@else
Jl. Harapan VIII Lot LL No. 9-10. Kawasan KIIC,<br>Karawang, Jawa Barat
@endif
<br><br>
Untuk konfirmasi silahkan kunjungi halaman profil Anda di website AIIA atau klik link berikut :<br>
{{ route('profiles.applied-jobs.index') }}

<br>
<b>Note: Dilarang Menggunakan Baju Hitam Putih</b>

<br>
Terimakasih<br>
(HRD PT Aisin Indonesia Automotive)

@endcomponent
