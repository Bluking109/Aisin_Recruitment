@extends('website.layouts.master')
@section('title', 'Pekerjaan Dilamar')

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
			 	<div class="col-lg-9 column">
			 		<div class="padding-left">
				 		<div class="manage-jobs-sec">
				 			<h3>Pekerjaan Dilamar</h3>
					 		<table>
					 			<thead>
					 				<tr>
					 					<td>Posisi</td>
					 					<td>Tahap</td>
					 					<td>Tanggal Lamaran</td>
					 					<td>Status</td>
					 					<td></td>
					 				</tr>
					 			</thead>
					 			<tbody>
					 				<tr>
					 					<td>
					 						<div class="table-list-title">
					 							<h3><a href="#" title="">Web Designer / Developer</a></h3>
					 						</div>
					 					</td>
					 					<td>
					 						<div class="table-list-title">
					 							<h3>Psikotest</h3>
					 						</div>
					 					</td>
					 					<td>
					 						<span>25 Agustus 2019</span><br />
					 					</td>
					 					<td>
					 						<span class="text-success">Proses</span>
					 					</td>
					 					<td>
					 						<ul class="action_job">
					 							<li><span>Hapus</span><a href="#" title=""><i class="fa fa-trash"></i></a></li>
					 							<li><span>Edit</span><a href="#" title=""><i class="fa fa-pencil"></i></a></li>
					 							<li><span>Detail</span><a href="#" title=""><i class="fa fa-eye"></i></a></li>
					 						</ul>
					 					</td>
					 				</tr>
					 				<tr>
					 					<td>
					 						<div class="table-list-title">
					 							<h3><a href="#" title="">Web Designer / Developer</a></h3>
					 						</div>
					 					</td>
					 					<td>
					 						<div class="table-list-title">
					 							<h3>Interview</h3>
					 						</div>
					 					</td>
					 					<td>
					 						<span>26 Agustus 2019</span><br/>
					 					</td>
					 					<td>
					 						<span class="text-danger">Ditolak</span>
					 					</td>
					 					<td>
					 						<ul class="action_job">
					 							<li><span>Hapus</span><a href="#" title=""><i class="fa fa-trash"></i></a></li>
					 							<li><span>Edit</span><a href="#" title=""><i class="fa fa-pencil"></i></a></li>
					 							<li><span>Detail</span><a href="#" title=""><i class="fa fa-eye"></i></a></li>
					 						</ul>
					 					</td>
					 				</tr>
					 				<tr>
					 					<td>
					 						<div class="table-list-title">
					 							<h3><a href="#" title="">Web Designer / Developer</a></h3>
					 						</div>
					 					</td>
					 					<td>
					 						<div class="table-list-title">
					 							<h3>MCU</h3>
					 						</div>
					 					</td>
					 					<td>
					 						<span>27 Agustus 2019</span><br />
					 					</td>
					 					<td>
					 						<span class="text-info">Diterima</span>
					 					</td>
					 					<td>
					 						<ul class="action_job">
					 							<li><span>Hapus</span><a href="#" title=""><i class="fa fa-trash"></i></a></li>
					 							<li><span>Edit</span><a href="#" title=""><i class="fa fa-pencil"></i></a></li>
					 							<li><span>Detail</span><a href="#" title=""><i class="fa fa-eye"></i></a></li>
					 						</ul>
					 					</td>
					 				</tr>
					 			</tbody>
					 		</table>
				 		</div>
				 	</div>
				</div>
			 </div>
		</div>
	</div>
</section>
@endsection