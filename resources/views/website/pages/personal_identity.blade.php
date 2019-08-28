@extends('website.layouts.master')
@section('title', 'Identitas')

@push('additional_css')
<link rel="stylesheet" type="text/css" href="{{ asset('website/css/bootstrap-datepicker.css') }}" />
@endpush

@section('pages')
<section class="mt-126">
	<div class="block no-padding">
		<div class="container">
			 <div class="row no-gape">
			 	<aside class="col-md-3 column border-right">
			 		<div class="widget">
			 			<div class="tree_widget-sec">
			 				@include('website.includes.job_seeker_menu')
			 			</div>
			 		</div>
			 	</aside>
			 	<div class="col-md-9 column">
			 		<div class="padding-left">
				 		<div class="profile-title">
				 			<h3>Identitas Pribadi</h3>
				 			<div class="upload-img-bar">
				 				<span class="round"><img src="http://placehold.it/140x140" alt="" /><i>x</i></span>
				 				<div class="upload-info">
				 					<h4>Foto Terbaru</h4>
				 					<a href="#" title="">Browse</a>
				 					<span>Maksimal 1MB, Format : jpg, jpeg, png</span>
				 				</div>
				 			</div>
				 		</div>
				 		<div class="profile-form-edit mb-5">
				 			<form>
				 				<div class="row">
				 					<div class="col-md-6">
				 						<span class="pf-title">Nama Lengkap <i class="fa fa-info-circle text-warning" data-toggle="tooltip" title="Diisi sesuai ijazah terakhir"></i></span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Lengkap" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Nomer KTP</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nomer KTP" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Email</span>
				 						<div class="pf-field">
				 							<input type="text" class="disabled" placeholder="Email" disabled="disabled" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Tempat Lahir</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tempat Lahir" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Tanggal Lahir</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" class="datepicker" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Jenis Kelamin</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="gender" id="man"><label for="man">Laki-Laki</label>
												<input type="Radio" name="gender" id="women"><label for="women">Perempuan</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Alamat Sesuai KTP</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Alamat KTP"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Provinsi KTP</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Allow In Search" class="chosen">
												<option>DKI Jakarta</option>
												<option>Jawa Tengah</option>
												<option>Jawa Barat</option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Kabupaten KTP</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Allow In Search" class="chosen">
												<option>Pekalongan</option>
												<option>Surakarta</option>
												<option>Bandung</option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Kecamatan KTP</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Allow In Search" class="chosen">
												<option>Wonopringgo</option>
												<option>Parangtritis</option>
												<option>Magelang</option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Kelurahan KTP</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Allow In Search" class="chosen">
												<option>Jetakkidul</option>
												<option>Kedung Patangewu</option>
												<option>Pegaden Tengah</option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Nomer Telepon</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nomer Telepon" />
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Nomer Telepon Orang Tua</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nomer Telepon Orang Tua" />
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Alamat Domisili</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Alamat KTP"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Provinsi Domisili</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Allow In Search" class="chosen">
												<option>DKI Jakarta</option>
												<option>Jawa Tengah</option>
												<option>Jawa Barat</option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Kabupaten Domisili</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Allow In Search" class="chosen">
												<option>Pekalongan</option>
												<option>Surakarta</option>
												<option>Bandung</option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Kecamatan Domisili</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Allow In Search" class="chosen">
												<option>Wonopringgo</option>
												<option>Parangtritis</option>
												<option>Magelang</option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Kelurahan Domisili</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Allow In Search" class="chosen">
												<option>Jetakkidul</option>
												<option>Kedung Patangewu</option>
												<option>Pegaden Tengah</option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Nomer Telepon Domisili</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nomer Telepon Domisili" />
				 						</div>
				 					</div>
				 					<div class="col-sm-3 sim-wrapper">
				 						<span class="pf-title">SIM Yang Dimiliki</span>
			 							<div class="pf-field">
				 							<p class="remember-label">
												<input type="checkbox" class="sim-select" name="sim[0][type]" id="sim-a" data-id="#sim-a-number"><label for="sim-a" value="SIM A">SIM A</label>
											</p>
				 						</div>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="checkbox" class="sim-select" name="sim[1][type]" id="sim-b" data-id="#sim-b-number"><label for="sim-b" value="SIM B">SIM B</label>
											</p>
				 						</div>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="checkbox" class="sim-select" name="sim[2][type]" id="sim-c" data-id="#sim-c-number"><label for="sim-c" value="SIM C">SIM C</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-sm-9 sim-wrapper">
				 						<span class="pf-title">Nomer SIM</span>
			 							<div class="pf-field">
				 							<input type="text" id="sim-a-number" placeholder="Nomer SIM A" name="sim[0][value]" disabled />
				 						</div>
				 						<div class="pf-field">
				 							<input type="text" id="sim-b-number" placeholder="Nomer SIM B" name="sim[1][value]" disabled />
				 						</div>
				 						<div class="pf-field">
				 							<input type="text" id="sim-c-number" placeholder="Nomer SIM C" name="sim[2][value]" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Nomer Handphone</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nomer Handphone" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Golongan Darah</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="blood_type" id="a"><label for="a">A</label>
												<input type="Radio" name="blood_type" id="b"><label for="b">B</label>
												<input type="Radio" name="blood_type" id="ab"><label for="ab">AB</label>
												<input type="Radio" name="blood_type" id="o"><label for="o">O</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Agama</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="religion" id="islam"><label for="islam">Islam</label>
												<input type="Radio" name="religion" id="hindu"><label for="hindu">Hindu</label>
												<input type="Radio" name="religion" id="budha"><label for="budha">Budha</label>
												<input type="Radio" name="religion" id="katolik"><label for="katolik">Katolik</label>
												<input type="Radio" name="religion" id="protestan"><label for="protestan">Protestan</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Tinggi Badan (cm)</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tinggi Badan" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Berat Badan (kg)</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Berat Badan" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Ukuran Baju</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="uniform_size" id="m"><label for="m">M</label>
												<input type="Radio" name="uniform_size" id="l"><label for="l">L</label>
												<input type="Radio" name="uniform_size" id="xl"><label for="xl">XL</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Ukuran Celana</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="uniform_size" id="m"><label for="m">M</label>
												<input type="Radio" name="uniform_size" id="l"><label for="l">L</label>
												<input type="Radio" name="uniform_size" id="xl"><label for="xl">XL</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Ukuran Sepatu</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="uniform_size" id="m"><label for="m">M</label>
												<input type="Radio" name="uniform_size" id="l"><label for="l">L</label>
												<input type="Radio" name="uniform_size" id="xl"><label for="xl">XL</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<br><br>
				 						<button type="submit">Update</button>
				 					</div>
				 				</div>
				 			</form>
				 		</div>
				 	</div>
				</div>
			 </div>
		</div>
	</div>
</section>
@endsection

@push('additional_js')
<script src="{{ asset('website/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script>
	$(function(){
		$('.datepicker').datepicker({
		    format: 'mm-dd-yyyy'
		});

		$('.sim-select').on('change', function() {
			let checked = $(this).prop('checked');
			let target = $(this).data('id');

			if (checked) {
				$(target).prop('disabled', false);
			} else {
				$(target).prop('disabled', true);
			}
		});
	});
</script>
@endpush