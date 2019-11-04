<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data - {{ $jobSeeker->name ?? '-' }}</title>
	<style type="text/css">
		p {
			font-size: 12px;
		}

		.logo {
			margin-top: 10px;
			width : 250px;
			height: auto;
		}

		.header-title {
			font-size: 14px;
			font-weight: bold;
		}

		.row {
			width: 100%;
			position: static;
			padding: 2px 20px;
			margin: 2px 2px 2px 2px;
			clear: both;
		}

		.col {
			float: left;
			padding: 3px;
		}

		.c6 {
			width: 6%;
		}

		.c10 {
			width: 10%;
		}

		.c18 {
			width: 18%;
		}

		.c20 {
			width: 20%;
		}

		.c21 {
			width: 21%
		}

		.c25 {
			width: 25%;
		}

		.c33 {
			width: 33%;
		}

		.c40 {
			width: 40%;
		}

		.c45 {
			width: 45%;
		}

		.c50 {
			width: 50%;
		}

		.c75 {
			width: 75%;
		}

		.c100 {
			width: 100%;
		}

		.header-sub-tittle {
			margin-top: 0px;
			text-align: center;
		}

		.header-tittle {
			margin-bottom: 0px;
			text-align: center;
		}

		.sub-tittle {
			margin-top: 2px;
   			margin-bottom: 2px;
			font-size: 16px;
			padding: 2px 2px 2px 2px;
			font-weight: bold;
		}

		.description {
			font-size: 10px;
			margin-top: 2px;
   			margin-bottom: 2px;
		}

		.descriptionpadding {
			font-size: 10px;
			margin-top: 2px;
   			margin-bottom: 2px;
   			padding-left: 15px;
		}

		.photo-profile {
			width: 3cm;
			height: 4cm;
			border: 1px solid #000000;
		}

		.bordered {
			border-collapse: collapse;
		}

		.bordered tr td {
			border: 1px solid #000000;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="col c50">
			<img class="logo" src="{{ public_path('admin/images/logo/logo.png') }}">
		</div>
		<div class="col c45">
			<p class="header-title">PT. AISIN INDONESIA AUTOMOTIVE</p>
			<p>Jalan Harapan VIII Kawasan Industri KIIC Lot LL No 9-10, Karawang Jawa Barat</p>
		</div>
	</div>
	<div class="row">
		<div class="col c75">
			<h3 class="header-tittle">FORMULIR LAMARAN KERJA</h3>
			<p class="header-sub-tittle">FRM-HRD-S1-003-01</p>
			<br>
			<p class="sub-tittle">ISILAH DENGAN DATA YANG SEBENAR-BENARNYA DAN DAPAT DIPERTANGGUNGJAWABKAN !</p>
		</div>
		<div class="col c20">
			<img class="photo-profile" src="{{ $profilPhoto }}">
		</div>
	</div>
	<div class="row">
		<div class="col c100">
			<p class="sub-tittle c50">A. IDENTITAS</p>
			<div class="c100">
				<table class="c100 description">
					<tr>
						<td class="c25">Nama Lengkap *)</td>
						<td class="c25">: {{ $jobSeeker->name ?? '-' }}</td>
						<td class="c25">Agama</td>
						<td class="c25">: {{ $jobSeeker->religion_label ?? '-' }}</td>
					</tr>
					<tr>
						<td>Tempat & Tgl lahir</td>
						<td>: {{ $jobSeeker->place_of_birth ?? '-' }} & {{ date('d F Y', strtotime($jobSeeker->date_of_birth)) ?? '-' }}</td>
						<td>Jenis Kelamin</td>
						<td>: {{ $jobSeeker->gender_label ?? '-' }}</td>
					</tr>
					<tr>
						@php
                        $drivingLicences = null;

                        if ($jobSeeker) {
                            $drivingLicences = $jobSeeker->driving_licences;
                        }
                        @endphp
                        @if(!$drivingLicences)
                            <td>SIM</td>
                            <td>: -</td>
                        @else
                        @foreach($drivingLicences as $key => $value)
                            <td>SIM</td>
                            <td>:  {{ $key }}</td>
                        @endforeach
                        @endif
						<td>Golongan Darah</td>
						<td>: {{ $jobSeeker->blood_type ?? '-' }} </td>
					</tr>
					<tr>
						@if(!$drivingLicences)
                            <td>No SIM Yang dimiliki</td>
                            <td>: -</td>
                        @else
                        @foreach($drivingLicences as $key => $value)
                            <td>No SIM Yang dimiliki</td>
                            <td>: {{ $value }}</td>
                        @endforeach
                        @endif

						<td>Tinggi Badan</td>
						<td>: {{ $jobSeeker->height ?? '-' }} cm</td>
					</tr>
					<tr>
						<td>Nomor KTP</td>
						<td>: {{ $jobSeeker->identity_number ?? '-' }}</td>
						<td>Berat Badan</td>
						<td>: {{ $jobSeeker->weight ?? '-' }} kg</td>
					</tr>
					<tr>
						<td>Nomor Handphone</td>
						<td>: {{ $jobSeeker->handphone_number ?? '-' }}</td>
						<td>Ukuran Baju</td>
						<td>: {{ $jobSeeker->clothes_size ?? '-' }}</td>
					</tr>
					<tr>
						<td>Alamat Email</td>
						<td>: {{ $jobSeeker->email ?? '-' }}</td>
						<td>Ukuran Celana Panjang</td>
						<td>: {{ $jobSeeker->pants_size ?? '-' }}</td>
					</tr>
					<tr>
						<td>Alamat Sesuai KTP</td>
						<td>:</td>
						<td>Ukuran Sepatu</td>
						<td>: {{ $jobSeeker->shoe_size ?? '-' }}</td>
					</tr>
					<tr>
						<td colspan="4">
							{{ $jobSeeker->address ?? '-' }},
                            @if($jobSeeker->addressVillage)
                             {{ ucwords(strtolower($jobSeeker->addressVillage->name)) }},
                             {{ ucwords(strtolower($jobSeeker->addressVillage->subDistrict->name)) }},
                             {{ ucwords(strtolower($jobSeeker->addressVillage->subDistrict->district->name)) }},
                             {{ ucwords(strtolower($jobSeeker->addressVillage->subDistrict->district->province->name)) }}
                             @endif
						</td>
					</tr>
					<tr>
						<td>Nomor HP orang tua</td>
						<td>: {{ $jobSeeker->address_telephone_number ?? '-' }}</td>
					</tr>
					<tr>
						<td>Alamat Domisili</td>
						<td>:</td>
					</tr>
					<tr>
						<td colspan="4">
							{{ $jobSeeker->domicile ?? '-' }},
                            @if($jobSeeker->domicileVillage)
                             {{ ucwords(strtolower($jobSeeker->domicileVillage->name)) }},
                             {{ ucwords(strtolower($jobSeeker->domicileVillage->subDistrict->name)) }},
                             {{ ucwords(strtolower($jobSeeker->domicileVillage->subDistrict->district->name)) }},
                             {{ ucwords(strtolower($jobSeeker->domicileVillage->subDistrict->district->province->name)) }}
                             @endif
						</td>
					</tr>
				</table>
			</div>

		</div>
	</div>
	<div class="row">
		<div class="col c100">
			<p class="sub-tittle c50">B. PENDIDIKAN</p>
			<p class="description"><b>1. Pendidikan Formal</b></p>
			<div class="c100">
				@if($jobSeeker->formalEducations->count())
	                @php
	                $education = collect($jobSeeker->formalEducations->toArray());
	                $sma = array_values($education->where('class', App\Models\FormalEducation::EDU_SENIOR_HIGH_SCHOOL)->toArray())[0];
	                @endphp
	                @if($jobSeeker->educationLevel->isHighSchoolForm())
		                @php
		                $sd = array_values($education->where('class', App\Models\FormalEducation::EDU_PRIMARY_SCHOOL)->toArray());
		                $sd = isset($sd[0]) ? $sd[0] : null;
		                $smp = array_values($education->where('class', App\Models\FormalEducation::EDU_JUNIOR_HIGH_SCHOOL)->toArray());
		                $smp = isset($smp[0]) ? $smp[0] : null;
		                @endphp
						<table class="c100 description bordered">
							<tr>
								<td></td>
								<td>Nama Sekolah</td>
								<td>Jurusan</td>
								<td>Tahun Lulus</td>
								<td>Tempat</td>
								<td>Nilai rata-rata MTK (smt 1-6)</td>
								<td>Nilai UN MTK</td>
								<td>Keterangan</td>
							</tr>
							<tr>
								<td>SD</td>
		                        <td>{{ $sd['name_of_institution'] ?? '-' }}</td>
		                        <td>{{ $sd['major'] ?? '-' }}</td>
		                        <td>{{ $sd['end_year'] ?? '-' }}</td>
		                        <td>{{ $sd['city'] ?? '-' }}</td>
		                        <td>{{ $sd['average_math_score'] ?? '-' }}</td>
		                        <td>{{ $sd['un_math_score'] ?? '-' }}</td>
		                        <td>{{ $sd['note'] ?? '-' }}</td>
							</tr>
							<tr>
								<td>SMP</td>
                                <td>{{ $smp['name_of_institution'] ?? '-' }}</td>
                                <td>{{ $smp['major'] ?? '-' }}</td>
                                <td>{{ $smp['end_year'] ?? '-' }}</td>
                                <td>{{ $smp['city'] ?? '-' }}</td>
                                <td>{{ $smp['average_math_score'] ?? '-' }}</td>
                                <td>{{ $smp['un_math_score'] ?? '-' }}</td>
                                <td>{{ $smp['note'] ?? '-' }}</td>
							</tr>
							<tr>
								<td>SMA</td>
                                <td>{{ $sma['name_of_institution'] ?? '-' }}</td>
                                <td>{{ $sma['major'] ?? '-' }}</td>
                                <td>{{ $sma['end_year'] ?? '-' }}</td>
                                <td>{{ $sma['city'] ?? '-' }}</td>
                                <td>{{ $sma['average_math_score'] ?? '-' }}</td>
                                <td>{{ $sma['un_math_score'] ?? '-' }}</td>
                                <td>{{ $sma['note'] ?? '-' }}</td>
							</tr>
						</table>
	                @endif
                @else
                @endif
			</div>
			<br>
			<p class="description"><b>2. Pendidikan Non Formal</b></p>
			<div class="c100">
				@if($jobSeeker->nonFormalEducations->count())
					<table class="c100 description bordered">
						<tr>
							<td class="c6">No</td>
							<td class="c21">Nama Kursus / Training</td>
							<td class="c21">Tempat</td>
							<td class="c21"> .. s/d ..</td>
							<td class="c21">Keterangan</td>
						</tr>
						@foreach($jobSeeker->nonFormalEducations as $i => $v)
	                    <tr>
	                        <td>{{ $i + 1 }}</td>
	                        <td>{{ $v->training_name }}</td>
	                        <td>{{ $v->place }}</td>
	                        <td>{{ $v->start_date . ' - ' . $v->end_date }}</td>
	                        <td>{{ $v->note ?? '-' }}</td>
	                    @endforeach
					</table>
				@else
                	<p class="description">Data tidak tersedia</p>
                @endif
			</div>
			<br>
			<p class="description"><b>3. Bahasa Asing yang Dikuasai</b></p>
			<div class="c100">
				@if($jobSeeker->foreignLanguages->count())
					<table class="c100 description bordered">
						<tr>
							<td class="c6">No</td>
							<td class="c21">Bahasa</td>
							<td class="c21">Berbicara</td>
							<td class="c21">Tulisan</td>
							<td class="c21">Tata bahasa</td>
						</tr>
						@foreach($jobSeeker->foreignLanguages as $i => $v)
	                    <tr>
	                        <td>{{ $i + 1 }}</td>
	                        <td>{{ $v->language }}</td>
	                        <td>{{ ucwords($v->writing) }}</td>
	                        <td>{{ ucwords($v->reading) }}</td>
	                        <td>{{ ucwords($v->grammar) }}</td>
	                    @endforeach
					</table>
                @else
                	<p class="description">Data tidak tersedia</p>
                @endif
			</div>
			<p class="description">4. Pengalaman Organinsasi </p>
			<div>
				@php
                    $organizations = $jobSeeker->organizations;
                    @endphp
					<table class="c100 description bordered">
						<tr>
							<td class="c6">No</td>
							<td class="c25">Nama Organisasi</td>
							<td class="c25">Tempat</td>
							<td class="c25">Jabatan</td>
							<td>..s/d..</td>
						</tr>
						@if($organizations->count())
                        @foreach ($organizations as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->place }}</td>
                            <td>{{ $item->position }}</td>
                            <td>{{ $item->start_date }}/{{ $item->end_date }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center">No Data</td>
                        </tr>
                        @endif>
					</table>
			</div>

		</div>
	</div>
	<div class="row">
		<div class="col c100">
			<p class="sub-tittle c50">C. LINGKUNGAN KELUARGA</p>
			<div class="c100">
				<p class="description"><b>1. Status Pernikahan</b></p>
				<div>
					<table class="c100 description bordered">
						<tr>
							<td class="c33">#</td>
							<td class="c33">Status</td>
							<td class="c33">Tanggal</td>
						</tr>
						<tr>
                            <td>KTP</td>
                            <td>{{ $jobSeeker->maritalStatus->marital_ktp_label ?? '-' }}</td>
                            <td>{{ $jobSeeker->maritalStatus->date_ktp ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td>Actual</td>
                            <td>{{ $jobSeeker->maritalStatus->marital_actual_label ?? '-' }}</td>
                            <td>{{ $jobSeeker->maritalStatus->date_actual ?? '-' }}</td>
                        </tr>
					</table>
				</div>
				<br>
				<p class="description"><b>2. Susunan Keluarga (Istri/Suami dan Anak-anak)</b></p>
				<div>
					<table class="c100 description bordered">
						<tr>
							<td class="c10"></td>
							<td class="c18">Nama</td>
							<td class="c18">L/P</td>
							<td class="c18">Tempat/Tgl Lahir</td>
							<td class="c18">Pendidikan</td>
							<td class="c18">Pekerjaan</td>
						</tr>
						@if(!$jobSeeker->partner)
	                        <tr>
								<td>Istri / Suami</td>
	                            <td colspan="5" class="text-center">No Data</td>
	                        </tr>
                        @else
							<tr>
								<td>Istri / Suami</td>
								<td>{{ $jobSeeker->partner->name }}</td>
								<td>{{ $jobSeeker->partner->gender_label }}</td>
								<td>{{ $jobSeeker->partner->place_of_birth . ', ' . $jobSeeker->partner->date_of_birth }}</td>
								<td>{{ $jobSeeker->partner->last_education }}</td>
								<td>{{ $jobSeeker->partner->job }}</td>
						</tr>
                        @endif
						@if($jobSeeker->children->count())
	                        @foreach($jobSeeker->children as $key => $v)
		                        <tr>
		                            <td> Anak-{{ $key + 1 }}</td>
		                            <td>{{ $v->name }}</td>
		                            <td>{{ $v->gender_label }}</td>
		                            <td>{{ $v->place_of_birth . ', ' . $v->date_of_birth }}</td>
		                            <td>{{ $v->last_education ?? '-' }}</td>
		                            <td>{{ $v->job ?? '-' }}</td>
		                        </tr>
	                        @endforeach
                        @else
	                        <tr>
								<td>Anak</td>
	                            <td colspan="5" class="text-center">No Data</td>
	                        </tr>
                        @endif
					</table>
				</div>

				<br>
				<p class="description"><b>3. Susunan Keluarga (Ayah, Ibu, Saudara Kandung, termasuk Anda</b></p>
				<div>
					<table class="c100 description bordered">
						<tr>
							<td class="c10"></td>
							<td class="c18">Nama</td>
							<td class="c18">L/P</td>
							<td class="c18">Tempat/Tgl Lahir</td>
							<td class="c18">Pendidikan</td>
							<td class="c18">Pekerjaan</td>
						</tr>
						@if(!$father = $jobSeeker->father)
	                        <tr>
								<td>Ayah</td>
	                            <td colspan="5" class="text-center">No Data</td>
	                        </tr>
                        @else
							<tr>
								<td>Ayah</td>
								<td>{{ $father->name }}</td>
								<td>Laki-laki</td>
								<td>{{ $father->place_of_birth . ', ' . $father->date_of_birth }}</td>
								<td>{{ $father->last_education }}</td>
								<td>{{ $father->job }}</td>
							</tr>
                        @endif
                        @if(!$mother = $jobSeeker->mother)
	                        <tr>
								<td>Ibu</td>
	                            <td colspan="5" class="text-center">No Data</td>
	                        </tr>
                        @else
							<tr>
								<td>Ibu</td>
								<td>{{ $mother->name }}</td>
								<td>Perempuan</td>
								<td>{{ $mother->place_of_birth . ', ' . $mother->date_of_birth }}</td>
								<td>{{ $mother->last_education }}</td>
								<td>{{ $mother->job }}</td>
							</tr>
                        @endif
                        @if($jobSeeker->siblings->count())
	                        @foreach($jobSeeker->siblings as $key => $v)
	                        <tr>
	                            <td> Saudara-{{ $key + 1 }}</td>
	                            <td>{{ $v->name }}</td>
	                            <td>{{ $v->gender_label }}</td>
	                            <td>{{ $v->place_of_birth . ', ' . $v->date_of_birth }}</td>
	                            <td>{{ $v->last_education ?? '-' }}</td>
	                            <td>{{ $v->job ?? '-' }}</td>
	                        </tr>
	                        @endforeach
                        @else
                        <tr>
	                        <td>Saudara</td>
                            <td colspan="5" class="text-center">No Data</td>
                        </tr>
                        @endif
					</table>
				</div>

			</div>
		</div>
	</div>
	<div class="row">
		<div class="col c100">
			<p class="sub-tittle c50">D. RIWAYAT PEKERJAAN</p>
			<div class="c100">
				<p class="description"><b>1. Pengalaman Kerja</b></p>
				<div>
					<table class="c100 description bordered">
						<tr>
							<td class="c6">No</td>
							<td class="c20">Nama Perusahaan</td>
							<td class="c20">Jabatan</td>
							<td class="c10">Gaji</td>
							<td class="c10">..s/d..</td>
							<td>Alasan Pindah</td>
						</tr>
						@if($jobSeeker->workExperiences->count())
                            @foreach($jobSeeker->workExperiences as $key => $v)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $v->company ?? '-' }}</td>
                                <td>{{ $v->position ?? '-' }}</td>
                                <td>{{ $v->salary ?? '0' }}</td>
                                <td>{{ $v->join_date ?? '-' }}/{{ $v->end_date ?? '-' }}</td>
                                <td>{{ $v->reason_to_move ?? '-' }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No Data</td>
                            </tr>
                        @endif
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="c100">
			<p class="sub-tittle c50">E. MINAT DAN KONSEP PRIBADI</p>
			<div class="c100">
				<p class="description">1. Keahlian apa yang Anda miliki ?</p>
                <p class="description">{{ $interest->expertise ?? '-' }}</p>
				<br>
				<p class="description">2. Apa yang mendorong anda ingin bekerja ?</p>
				<p class="description"> {{ $interest->working_motivation ?? '-' }} </p>
				<br>
				<p class="description">3. Mengapa Anda ingin bekerja di Perusahaan kami ?</p>
				<p class="description"> {{ $interest->working_reason ?? '-' }} </p>
				<br>
				<p class="description">4. Sebutkan gaji yang Anda inginkan :</p>
				<p class="description"> Rp. {{ $interest->expected_salary ?? '-' }} </p>
				<br>
				<p class="description">5. Kapan Anda dapat mulai bekerja :</p>
				<p class="description"> {{ $interest->join_date ?? '-' }} </p>
				<br>
				<p class="description">6. Apakah ada kenalan, kerabat, atau keluarga Anda yang bekerja di PT. Aisin Indonesia Automotive? dan apa hubungannya ?</p>
				<div>
					@php
                    $friends = $jobSeeker->friends;
                    @endphp
					<table class="c100 description bordered">
						<tr>
							<td class="c6">No</td>
							<td class="c25">Nama</td>
							<td class="c25">Jabatan</td>
							<td class="c18">No Telepon</td>
							<td>Hubungan</td>
						</tr>
						@if($friends->count())
	                        @foreach ($friends as $key => $item)
	                        <tr>
	                            <td>{{ $key + 1 }}</td>
	                            <td>{{ $item->name }}</td>
	                            <td>{{ $item->position }}</td>
	                            <td>{{ $item->telephone_number }}</td>
	                            <td>{{ $item->relationship }}</td>
	                        </tr>
	                        @endforeach
                        @else
	                        <tr>
	                            <td colspan="5" class="text-center">No Data</td>
	                        </tr>
                        @endif
					</table>
				</div>
				<br>
				<p class="description">7. Pilih 3 jenis bidang pekerjaan dibawah ini yang sesuai dengan prioritas minat Anda (urutkan dari 1 sampai 3) !</p>
					<ol class="description">
						@if(isset($fields))
							@foreach ($fields as $item)
		                    	<li class="description">{{ $item }}</li>
		                    @endforeach
		                @else
		                	<li class="description"> - </li>
		                @endif
                    </ol>
				<br>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="c100">
			<p class="sub-tittle c50">F. LAIN-LAIN</p>
			<div class="c100">
				<p class="description">1. Pernahkah anda mengikuti psikotest PT. Aisin Indonesia Automotive sebelumnya ? Belum / Pernah* (coret salah satu)</p>
				<p class="description">Jika pernah, mohon isi data dibawah ini :</p>
				<div>
					@php
                    $otherRecruitments = $jobSeeker->otherRecruitments;
                    @endphp
					<table class="c100 description bordered">
						<tr>
							<td class="c6">No</td>
							<td class="c18">Astra Group</td>
							<td class="c20">Proses</td>
							<td class="c10">Tempat</td>
							<td class="c10">Waktu</td>
							<td class="c10">Posisi</td>
							<td>Status</td>
						</tr>
						@if($otherRecruitments->count())
                            @foreach ($otherRecruitments as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->organizer }}</td>
                                <td>{{ $item->is_astra == 1 ? 'Ya' : 'Bukan' }}</td>
                                <td>{{ $item->process_label }}</td>
                                <td>{{ $item->place }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->position }}</td>
                                <td>{{ $item->status_label }}</td>
                            </tr>
                            @endforeach
                        @else
	                        <tr>
	                            <td colspan="7" class="text-center">No Data</td>
	                        </tr>
                        @endif
					</table>
				</div>
				<br>
				<p class="description">2. Apa hobby / kegemaran Anda ?</p>
				<p class="description"> {{ $other->hobby ?? '-' }} </p>
				<br>
				<p class="description">3. Bagaimana cara Anda mengisi waktu luang ?</p>
				<p class="description"> {{ $other->fill_spare_time ?? '-' }} </p>
				<br>
				<p class="description">4. Sebutkan minimal 3 Kelebihan Sifat anda ( Strong point ) !</p>
				<p class="description"> {{ $other->strong_point ?? '-' }} </p>
				<br>
				<p class="description">5. Sebutkan minimal 3 Kekurangan Sifat anda ( Weak point )  !</p>
				<p class="description"> {{ $other->weak_point ?? '-' }} </p>
				<br>
				<p class="description">6. Pernahkah anda menderita penyakit yang lama sembuh (ex. TBC, Typhus, Hepatitis dll) ?</p>
				<div>
					@php
                    $diseases = $jobSeeker->diseases;
                    @endphp
					<table class="c100 description bordered">
						<tr>
							<td class="c6">No</td>
							<td class="c25">Nama Penyakit</td>
							<td class="c18">..s/d..</td>
							<td>Akibatnya</td>
						</tr>
						@if($diseases->count())
	                        @foreach ($diseases as $key => $item)
		                        <tr>
		                            <td>{{ $key + 1 }}</td>
		                            <td>{{ $item->name }}</td>
		                            <td>{{ $item->from_date }} s/d {{ $item->end_date }}</td>
		                            <td>{{ $item->note }}</td>
		                        </tr>
	                        @endforeach
                        @else
	                        <tr>
	                            <td colspan="4" class="text-center">No Data</td>
	                        </tr>
                        @endif
					</table>
				</div>
				<br>
				<p class="description">Diisi dengan sesungguhnya. Apabila dikemudian hari ternyata ada hal-hal yang bertentangan, maka saya bersedia</p>
				<p class="description">dituntut sesuai dengan hukuman yang berlaku dan lamaran ini dapat dibatalkan</p>
				<br><br>
				<p class="description" style="text-align: right;">Tanggal</p>




			</div>
		</div>
	</div>
</body>
</html>