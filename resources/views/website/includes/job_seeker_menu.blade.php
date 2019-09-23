@php
$currentUrl = url()->current();
@endphp
<ul class="jobseeker-menu">
	<li @if($currentUrl === route('profiles.personal-identity.index'))class="active"@endif>
		<a href="{{ route('profiles.personal-identity.index') }}">
			<i class="fa fa-user"></i>Identitas Pribadi
		</a>
	</li>
	<li @if($currentUrl === route('profiles.education.index'))class="active"@endif>
		<a href="{{ route('profiles.education.index') }}">
			<i class="fa fa-graduation-cap"></i>Pendidikan
		</a>
	</li>
	<li @if($currentUrl === route('profiles.family.index'))class="active"@endif>
		<a href="{{ route('profiles.family.index') }}" title="">
			<i class="fa fa-group"></i>Lingkungan Keluarga
		</a>
	</li>
	<li @if($currentUrl === route('profiles.work-experience.index'))class="active"@endif>
		<a href="{{ route('profiles.work-experience.index') }}" title="">
			<i class="fa fa-suitcase"></i>Riwayat Pekerjaan
		</a>
	</li>
	<li @if($currentUrl === route('profiles.interest-concept.index'))class="active"@endif>
		<a href="{{ route('profiles.interest-concept.index') }}" title="">
			<i class="fa fa-life-ring"></i>Minat Dan Konsep Pribadi
		</a>
	</li>
	<li @if($currentUrl === route('profiles.document.index'))class="active"@endif>
		<a href="{{ route('profiles.document.index') }}" title="">
			<i class="fa fa-file-text"></i>Dokumen Pendukung
		</a>
	</li>
	<li @if($currentUrl === route('profiles.social-activity.index'))class="active"@endif>
		<a href="{{ route('profiles.social-activity.index') }}" title="">
			<i class="fa fa-share-alt"></i>Aktivitas Sosial
		</a>
	</li>
	<li @if($currentUrl === route('profiles.others.show'))class="active"@endif>
		<a href="{{ route('profiles.others.show') }}" title="">
			<i class="fa fa-puzzle-piece"></i>Lain-Lain
		</a>
	</li>
	<li class="divider"></li>
	<li @if($currentUrl === route('profiles.applied-jobs.show'))class="active"@endif>
		<a href="{{ route('profiles.applied-jobs.show') }}" title="">
			<i class="fa fa-send"></i>Pekerajaan yang Dilamar
		</a>
	</li>
	<li class="divider"></li>
	<li>
		<a href="candidates_change_password.html" title="" class="change-password-popup">
			<i class="fa fa-lock"></i>Change Password
		</a>
	</li>
	<li>
		<a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
			<i class="fa fa-sign-out"></i>Logout
		</a>
	</li>
</ul>