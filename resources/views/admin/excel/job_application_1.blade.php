<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Job Application</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th colspan="9" style="font-size: 14; font-weight: bold;">Data Lamaran Kerja</th>
			</tr>
		</thead>
	</table>
	<table>
		<thead>
			<tr>
				<th style="font-weight: bold">No</th>
				<th style="font-weight: bold">Nama</th>
				<th style="font-weight: bold">Nomer KTP</th>
				<th style="font-weight: bold">Nomer HP</th>
				<th style="font-weight: bold">Lowongan Kerja</th>
				<th style="font-weight: bold">Stage</th>
				<th style="font-weight: bold">Status Konfirmasi</th>
				<th style="font-weight: bold">Tanggal Tes</th>
				<th style="font-weight: bold">Waktu Tes</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $key => $datum)
			@php
			$lastStage = $datum->jobApplicationStages->last();
			@endphp
			<tr>
				<td>{{ $key + 1 }}</td>
				<td>{{ $datum->jobSeeker->name }}</td>
				<td>{{ $datum->jobSeeker->identity_number }}</td>
				<td>{{ $datum->jobSeeker->handphone_number }}</td>
				<td>{{ $datum->jobVacancy->position->name . ' - ' . $datum->jobVacancy->section->name }}</td>
				<td>{{ $lastStage ? $lastStage->stage->name : 'Seleksi Dokumen' }}</td>
				@if($lastStage)
				<td>{{ $lastStage->status == '1' ? 'Terkonfirmasi' : ($lastStage->status == '0' ? 'Belum Dikonfirmasi' : 'Ditolak') }}</td>
				@else
				<td>-</td>
				@endif
				@if($lastStage)
				<td>{{ date('Y-m-d', strtotime($lastStage->exam_at)) }}</td>
				<td>{{ date('H:i', strtotime($lastStage->exam_at)) }}</td>
				@else
				<td>-</td>
				<td>-</td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>