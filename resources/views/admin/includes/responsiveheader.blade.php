<div class="responsive-header">
    <div class="responsive-menubar">
        <div class="res-logo">
            <a href="#" title=""><img class="mini-logo" src="{{ asset('website/images/logo/Aisin.png') }}" alt="" /></a>
        </div>
        <div class="menu-resaction">
            <div class="res-openmenu">
                <img src="{{ asset('website/images/icon.png') }}" alt="" /> Menu
            </div>
            <div class="res-closemenu">
                <img src="{{ asset('website/images/icon6.png') }}" alt="" /> Close
            </div>
        </div>
    </div>
    <div class="responsive-opensec">
        @if(!auth()->guard('job_seekers')->check())
        <div class="btn-extars">
            <ul class="account-btns">
                <li class="signup-popup"><a href="#"><b><i class="la la-key"></i> Sign Up</b></a></li>
                <li class="signin-popup"><a href="#"><b><i class="la la-external-link-square"></i> Login</b></a></li>
            </ul>
        </div><!-- Btn Extras -->
        @endif
        <div class="responsivemenu">
            <ul>
                <li class="menu-item">
                    <a href="{{ route('admin.home') }}"><i class="fa fa-home"></i> Dashboard</a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('admin.job-vacancies.index') }}"><i class="fa fa-briefcase"></i> Job Vacancy</a>
                </li>
                <li class="menu-item has-submenu">
                    <a href="#"><i class="fa fa-users"></i> Job Seekers</a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.job-seekers.index') }}">List</a></li>
                        <li><a href="{{ route('admin.job-seekers.index', ['blacklist' => 1]) }}">Black List</a></li>
                    </ul>
                </li>
                <li class="menu-item has-submenu">
                    <a href="#"><i class="fa fa-folder-open"></i> Job Applications</a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.job-applications.in-process') }}">In Process</a></li>
                        <li><a href="{{ route('admin.job-applications.accepted') }}">Accepted</a></li>
                        <li><a href="{{ route('admin.job-applications.rejected') }}">Rejected</a></li>
                        <li><a href="{{ route('admin.job-applications.assign') }}">Assign Application</a></li>
                    </ul>
                </li>
                @canany(['list_about', 'list_how_to_apply', 'list_announcement'])
                <li class="menu-item has-submenu">
                    <a href="#"><i class="fa fa-file"></i> Pages</a>
                    <ul class="submenu">
                        @can('list_about')
                        <li><a href="{{ route('admin.about-us.index') }}">About</a></li>
                        @endcan
                        @can('list_how_to_apply')
                        <li><a href="{{ route('admin.how-to-applies.index') }}">How To Apply</a></li>
                        @endcan
                        @can('list_announcement')
                        <li><a href="{{ route('admin.announcements.index') }}">Announcement</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                <li class="menu-item has-submenu">
                    <a href="#"><i class="fa fa-database"></i> Master Data</a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.recruitment-stages.index') }}">Recruitment Stage</a></li>
                        <li><a href="{{ route('admin.departments.index') }}">Departments</a></li>
                        <li><a href="{{ route('admin.sections.index') }}">Sections</a></li>
                        <li><a href="{{ route('admin.positions.index') }}">Positions</a></li>
                        <li><a href="{{ route('admin.education-levels.index') }}">Education Levels</a></li>
                        <li><a href="{{ route('admin.majors.index') }}">Major</a></li>
                        <li><a href="{{ route('admin.vendors.index') }}">Vendors</a></li>
                        <li><a href="{{ route('admin.provinces.index') }}">Provinces</a></li>
                        <li><a href="{{ route('admin.districts.index') }}">Districts</a></li>
                        <li><a href="{{ route('admin.subdistricts.index') }}">Sub-Districts</a></li>
                        <li><a href="{{ route('admin.villages.index') }}">Villages</a></li>
                    </ul>
                </li>
                <li class="menu-item has-submenu">
                    <a href="#"><i class="fa fa-user-cog"></i> User Management</a>
                    <ul class="submenu">
                        <li><a href="{{ route('admin.users.index') }}">List</a></li>
                        <li><a href="{{ route('admin.permissions.index') }}">Permissions</a></li>
                        <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                    </ul>
                </li>
                @if(auth()->guard('job_seekers')->check())
                <li class="menu-item">
                    <a href="{{ route('profiles.personal-identity.index') }}"><i class="fa fa-user"></i> Profile</a>
                </li>
                <li class="menu-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
