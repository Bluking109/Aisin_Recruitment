@extends('website.layouts.master')
@section('title', 'List Pekerjaan')

@section('pages')
<section class="overlape sub-header mt-126">
	<div class="block no-padding">
		<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header wform">
						<div class="job-search-sec">
							<div class="job-search">
								<h4 class="text-left">Cari Pekerjaan Yang Sesuai Kualifikasi Anda</h4>
								<form>
									<div class="row">
										<div class="col-lg-7">
											<div class="job-field">
												<input type="text" placeholder="Cari" />
												<i class="la la-keyboard-o"></i>
											</div>
										</div>
										<div class="col-lg-1">
											<button type="submit"><i class="la la-search"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="block">
		<div class="container">
			 <div class="row">
			 	<div class="col-lg-12">
			 		<div class="filterbar">
			 			<h5>98 Lowongan Pekerjaan Tersedia</h5>
			 			<div class="sortby-sec">
			 				<span>Filter</span>
			 				<select data-placeholder="Pendidikan" class="chosen">
								<option>SMA</option>
								<option>D3</option>
								<option>S1</option>
							</select>
			 			</div>
			 		</div>
			 		<div class="job-grid-sec">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="job-grid border">
									<div class="job-title-sec">
										<div class="c-logo"> <a href="{{ route('jobs.show', ['slug' => 'ppic']) }}"><img src="{{ asset('website/images/ppic.jpg') }}" alt="" /></a> </div>
										<h3><a href="#" title="">Web Designer / Developer</a></h3>
										<span>Massimo Artemisis</span>
									</div>
									<span class="job-lctn">Karawang, Jawa Barat</span>
									<a  href="#" title="">Lamar</a>
								</div><!-- JOB Grid -->
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="job-grid border">
									<div class="job-title-sec">
										<div class="c-logo"> <a href="{{ route('jobs.show', ['slug' => 'ppic']) }}"><img src="{{ asset('website/images/ppic.jpg') }}" alt="" /></a> </div>
										<h3><a href="#" title="">Marketing Director</a></h3>
										<span>Massimo Artemisis</span>
									</div>
									<span class="job-lctn">Karawang, Jawa Barat</span>
									<a  href="#" title="">Lamar</a>
								</div><!-- JOB Grid -->
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="job-grid border">
									<div class="job-title-sec">
										<div class="c-logo"> <a href="{{ route('jobs.show', ['slug' => 'ppic']) }}"><img src="{{ asset('website/images/ppic.jpg') }}" alt="" /></a> </div>
										<h3><a href="#" title="">Application Developer For Android</a></h3>
										<span>Altes Bank</span>
									</div>
									<span class="job-lctn">Karawang, Jawa Barat</span>
									<a  href="#" title="">Lamar</a>
								</div><!-- JOB Grid -->
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="job-grid border">
									<div class="job-title-sec">
										<div class="c-logo"> <a href="{{ route('jobs.show', ['slug' => 'ppic']) }}"><img src="{{ asset('website/images/ppic.jpg') }}" alt="" /></a> </div>
										<h3><a href="#" title="">Web Designer / Developer</a></h3>
										<span>Batas Lamaran : 07 Agustus 2019</span>
									</div>
									<span class="job-lctn">Karawang, Jawa Barat</span>
									<a  href="#" title="">Lamar</a>
								</div><!-- JOB Grid -->
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="job-grid border">
									<div class="job-title-sec">
										<div class="c-logo"> <a href="{{ route('jobs.show', ['slug' => 'ppic']) }}"><img src="{{ asset('website/images/ppic.jpg') }}" alt="" /></a> </div>
										<h3><a href="#" title="">Web Designer / Developer</a></h3>
										<span>Batas Lamaran : 07 Agustus 2019</span>
									</div>
									<span class="job-lctn">Karawang, Jawa Barat</span>
									<a  href="#" title="">Lamar</a>
								</div><!-- JOB Grid -->
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="job-grid border">
									<div class="job-title-sec">
										<div class="c-logo"> <a href="{{ route('jobs.show', ['slug' => 'ppic']) }}"><img src="{{ asset('website/images/ppic.jpg') }}" alt="" /></a> </div>
										<h3><a href="#" title="">Web Designer / Developer</a></h3>
										<span>Batas Lamaran : 07 Agustus 2019</span>
									</div>
									<span class="job-lctn">Karawang, Jawa Barat</span>
									<a  href="#" title="">Lamar</a>
								</div><!-- JOB Grid -->
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="job-grid border">
									<div class="job-title-sec">
										<div class="c-logo"> <a href="{{ route('jobs.show', ['slug' => 'ppic']) }}"><img src="{{ asset('website/images/ppic.jpg') }}" alt="" /></a> </div>
										<h3><a href="#" title="">Web Designer / Developer</a></h3>
										<span>Batas Lamaran : 07 Agustus 2019</span>
									</div>
									<span class="job-lctn">Karawang, Jawa Barat</span>
									<a  href="#" title="">Lamar</a>
								</div><!-- JOB Grid -->
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="job-grid border">
									<div class="job-title-sec">
										<div class="c-logo"> <a href="{{ route('jobs.show', ['slug' => 'ppic']) }}"><img src="{{ asset('website/images/ppic.jpg') }}" alt="" /></a> </div>
										<h3><a href="#" title="">Web Designer / Developer</a></h3>
										<span>Batas Lamaran : 07 Agustus 2019</span>
									</div>
									<span class="job-lctn">Karawang, Jawa Barat</span>
									<a  href="#" title="">Lamar</a>
								</div><!-- JOB Grid -->
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="job-grid border">
									<div class="job-title-sec">
										<div class="c-logo"> <a href="{{ route('jobs.show', ['slug' => 'ppic']) }}"><img src="{{ asset('website/images/ppic.jpg') }}" alt="" /></a> </div>
										<h3><a href="#" title="">Web Designer / Developer</a></h3>
										<span>Batas Lamaran : 07 Agustus 2019</span>
									</div>
									<span class="job-lctn">Karawang, Jawa Barat</span>
									<a  href="#" title="">Lamar</a>
								</div><!-- JOB Grid -->
							</div>
						</div>
					</div>
					<div class="pagination">
						<ul>
							<li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Prev</a></li>
							<li><a href="">1</a></li>
							<li class="active"><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><span class="delimeter">...</span></li>
							<li><a href="">14</a></li>
							<li class="next"><a href="">Next <i class="la la-long-arrow-right"></i></a></li>
						</ul>
					</div><!-- Pagination -->
			 	</div>
			 </div>
		</div>
	</div>
</section>
@endsection