<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pelamar</title>
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
			<img class="photo-profile" src="{{ public_path('admin/images/avatar/avatar.jpg') }}">
		</div>
	</div>
	<div class="row">
		<div class="col c100">
			<p class="sub-tittle c50">A. IDENTITAS</p>
			<div class="c100">
				<table class="c100 description">
					<tr>
						<td class="c25">Nama Lengkap *)</td>
						<td class="c25">:</td>
						<td class="c25">Agama</td>
						<td class="c25">:</td>
					</tr>
					<tr>
						<td>Tempat & Tgl lahir</td>
						<td>:</td>
						<td>Jenis Kelamin</td>
						<td>:</td>
					</tr>
					<tr>
						<td>SIM Yang dimiliki</td>
						<td>:</td>
						<td>Golongan Darah</td>
						<td>:</td>
					</tr>
					<tr>
						<td>No SIM Yang dimiliki</td>
						<td>:</td>
						<td>Tinggi Badan</td>
						<td>:</td>
					</tr>
					<tr>
						<td>Nomor KTP</td>
						<td>:</td>
						<td>Berat Badan</td>
						<td>:</td>
					</tr>
					<tr>
						<td>Nomor Handphone</td>
						<td>:</td>
						<td>Ukuran Baju</td>
						<td>:</td>
					</tr>
					<tr>
						<td>Alamat Email</td>
						<td>:</td>
						<td>Ukuran Celana Panjang</td>
						<td>:</td>
					</tr>
					<tr>
						<td>Alamat Sesuai KTP</td>
						<td>:</td>
						<td>Ukuran Sepatu</td>
						<td>:</td>
					</tr>
					<tr>
						<td colspan="4">-</td>
					</tr>
					<tr>
						<td>Nomor HP orang tua</td>
						<td>:</td>
					</tr>
					<tr>
						<td>Alamat Domisili</td>
						<td>:</td>
					</tr>
					<tr>
						<td colspan="4">-</td>
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
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>SMP</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>SMK</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
			<br>
			<p class="description"><b>2. Pendidikan Non Formal</b></p>
			<div class="c100">
				<table class="c100 description bordered">
					<tr>
						<td class="c6">No</td>
						<td class="c21">Nama Kursus / Training</td>
						<td class="c21">Tempat</td>
						<td class="c21"> .. s/d ..</td>
						<td class="c21">Keterangan</td>
					</tr>
					<tr>
						<td>1</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>2</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>3</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>4</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
			<br>
			<p class="description"><b>3. Bahasa Asing yang Dikuasai</b></p>
			<div class="c100">
				<table class="c100 description bordered">
					<tr>
						<td rowspan="2" class="c6">No</td>
						<td rowspan="2" class="c21">Bahasa</td>
						<td colspan="2" class="c21">Berbicara</td>
						<td colspan="2" class="c21">Tulisan</td>
						<td colspan="2" class="c21">Tata bahasa</td>
					</tr>
					<tr>
						<td>Baik</td>
						<td>Kurang</td>
						<td>Baik</td>
						<td>Kurang</td>
						<td>Baik</td>
						<td>Kurang</td>
					</tr>
					<tr>
						<td>1</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>2</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>3</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>4</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
			<p class="description">4. Pengalaman Organinsasi		</p>
			<div>
				<table class="c100 description bordered">
					<tr>
						<td class="c6">No</td>
						<td class="c25">Nama Organisasi</td>
						<td class="c25">Tempat</td>
						<td class="c25">Jabatan</td>
						<td>..s/d..</td>
					</tr>
					<tr>
						<td>1</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
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
							<td class="c33">*Data Sesuai KTP</td>
							<td class="c33">*Data Actual</td>
							<td class="c33">*Keterangan Tanggal</td>
						</tr>
						<tr>
							<td>
								() Single/Tunangan <br>
								() M	enikah <br>
								() Bercerai
							</td>
							<td>
								() Single/Tunangan <br>
								() Menikah <br>
								() Bercerai
							</td>
							<td>

							</td>
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
						<tr>
							<td>Istri / Suami</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Anak 1</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Anak 2</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Anak 3</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
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
						<tr>
							<td>Ayah</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Ibu</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Anak 1</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Anak 2</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Anak 3</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Anak 4</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Anak 5</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Anak 6</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Anak 7</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
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
						<tr>
							<td>1</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>2</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>3</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>4</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>5</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>6</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>7</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
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
				<p> isi </p>
				<br>
				<p class="description">2. Apa yang mendorong anda ingin bekerja ?</p>
				<p> isi </p>
				<br>
				<p class="description">3. Mengapa Anda ingin bekerja di Perusahaan kami ?</p>
				<p> isi </p>
				<br>
				<p class="description">4. Sebutkan gaji yang Anda inginkan :</p>
				<p> isi </p>
				<br>
				<p class="description">5. Kapan Anda dapat mulai bekerja :</p>
				<p> isi </p>
				<br>
				<p class="description">6. Apakah ada kenalan, kerabat, atau keluarga Anda yang bekerja di PT. Aisin Indonesia Automotive? dan apa hubungannya ?</p>
				<p> isi </p>
				<br>
				<p class="description">7. Pilih 3 jenis bidang pekerjaan dibawah ini yang sesuai dengan prioritas minat Anda (urutkan dari 1 sampai 3) !</p>
				<p> isi </p>
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
					<table class="c100 description bordered">
						<tr>
							<td rowspan="2" class="c6">No</td>
							<td colspan="2" class="c18">penyelenggara</td>
							<td colspan="6" class="c50">Proses</td>
							<td rowspan="2" class="c10">Waktu</td>
							<td rowspan="2">Tempat</td>
						</tr>
						<tr>
							<td>Astra Group</td>
							<td>Non Astra Group</td>
							<td>Administrasi</td>
							<td>Psikotes</td>
							<td>Interview HRD</td>
							<td>Interview User</td>
							<td>MCU</td>
							<td>Lain-lain</td>
						</tr>
						<tr>
							<td>2</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>3</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</table>
				</div>
				<br>
				<p class="description">2. Apa hobby / kegemaran Anda ?</p>
				<p> isi </p>
				<br>
				<p class="description">3. Bagaimana cara Anda mengisi waktu luang ?</p>
				<p> isi </p>
				<br>
				<p class="description">4. Sebutkan minimal 3 Kelebihan Sifat anda ( Strong point ) !</p>
				<p> isi </p>
				<br>
				<p class="description">5. Sebutkan minimal 3 Kekurangan Sifat anda ( Weak point )  !</p>
				<p> isi </p>
				<br>
				<p class="description">6. Pernahkah anda menderita penyakit yang lama sembuh (ex. TBC, Typhus, Hepatitis dll) ?</p>
				<div>
					<table class="c100 description bordered">
						<tr>
							<td class="c6">No</td>
							<td class="c25">Nama Penyakit</td>
							<td class="c18">..s/d..</td>
							<td>Keterangan</td>
						</tr>
						<tr>
							<td>1</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>2</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
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