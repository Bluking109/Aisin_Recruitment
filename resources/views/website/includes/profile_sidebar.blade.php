@php
$user = auth()->guard('job_seekers')->user();
@endphp
<div class="profile-sidebar">
	<span class="close-profile"><i class="la la-close"></i></span>
	<div class="can-detail-s">
		<div class="cst"><img src="{{ $user->photo ? route('profiles.personal-identity.getphoto') : asset('website/images/avatar/avatar.png') }}" alt="" /></div>
		<h3>{{ $user->name }}</h3>
		<p>{{ $user->email }}</p>
		<p><i class="la la-map-marker"></i>{{ $user->address ?? '-' }}</p>
	</div>
	<div class="tree_widget-sec">
		@include('website.includes.job_seeker_menu')
		<form id="logout-form" action="{{ route('auth.logout') }}" class="d-none" method="POST">
	        @csrf
	    </form>
	</div>
</div><!-- Profile Sidebar -->