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
				<th style="font-weight: bold">Tempat Lahir</th>
				<th style="font-weight: bold">Tanggal Lahir</th>
				<th style="font-weight: bold">Usia</th>
				<th style="font-weight: bold">Jenis Kelamin</th>
				<th style="font-weight: bold">Alamat Domisili</th>
				<th style="font-weight: bold">Agama</th>
				<th style="font-weight: bold">Status Menikah</th>
				<th style="font-weight: bold">Pendidikan</th>
				<th style="font-weight: bold">Universitas</th>
				<th style="font-weight: bold">Jurusan</th>
				<th style="font-weight: bold">IPK</th>
				<th style="font-weight: bold">Posisi yang dilamar</th>
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
				<td>{{ $datum->jobSeeker->place_of_birth }}</td>
				<td>{{ $datum->jobSeeker->date_of_birth }}</td>
				<td>{{ $datum->jobSeeker->age }}</td>
				<td>{{ $datum->jobSeeker->gender == '1' ? 'Laki-laki' : $datum->jobSeeker->gender == '2' ? 'Wanita' : 'Waria' }}</td>
				<td>{{ $datum->jobSeeker->domicile }}</td>
				<td>{{ $datum->jobSeeker->religion_label }}</td>
				<td>{{ $datum->jobSeeker->maritalStatus->marital_ktp_label_id }}</td>
				<td>{{ $datum->jobSeeker->educationLevel->name }}</td>
				<td>{{ $datum->jobSeeker->last_education->name_of_institution }}</td>
				<td>{{ $datum->jobSeeker->last_education->major }}</td>
				<td>{{ $datum->jobSeeker->last_education->grade_point }}</td>
				<td>{{ $datum->jobVacancy->position->name }} {{ $datum->jobVacancy->section->name }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>