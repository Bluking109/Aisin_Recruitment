<nav class="bottom-navbar">
    <div class="container container-navbar">
        <ul class="nav page-navigation">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.home') }}">
                    <i class="mdi mdi-view-dashboard menu-icon"></i>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.job-vacancies.index') }}" class="nav-link">
                    <i class="mdi mdi-newspaper menu-icon"></i>
                    <span class="menu-title">Job Vacancy</span>
                    <i class="menu-arrow"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="mdi mdi-human-greeting menu-icon"></i>
                    <span class="menu-title">Job Seekers</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                    <ul>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.job-seekers.index') }}">List</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.job-seekers.index', ['blacklist' => 1]) }}">Black List</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="mdi mdi-file-document menu-icon"></i>
                    <span class="menu-title">Job Applications</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                    <ul>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.job-applications.in-process') }}">In Process</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.job-applications.accepted') }}">Accepted</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.job-applications.rejected') }}">Rejected</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.job-applications.assign') }}">Assign Application</a></li>
                    </ul>
                </div>
            </li>
            {{-- Sementara about permission protect page karena sub menu hanya 1 --}}
            @canany(['list_about', 'list_how_to_apply', 'list_announcement'])
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="mdi mdi-book-open-page-variant menu-icon"></i>
                    <span class="menu-title">Pages</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                    <ul>
                        @can('list_about')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.about-us.index') }}">About</a></li>
                        @endcan
                        @can('list_how_to_apply')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.how-to-applies.index') }}">How To Apply</a></li>
                        @endcan
                        @can('list_announcement')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.announcements.index') }}">Announcement</a></li>
                        @endcan
                    </ul>
                </div>
            </li>
            @endcanany
            {{-- end about permission --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="mdi mdi-database menu-icon"></i>
                    <span class="menu-title">Master Data</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                    <ul>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.recruitment-stages.index') }}">Recruitment Stage</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.departments.index') }}">Departments</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.sections.index') }}">Sections</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.positions.index') }}">Positions</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.education-levels.index') }}">Education Levels</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.majors.index') }}">Major</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.vendors.index') }}">Vendors</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.provinces.index') }}">Provinces</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.districts.index') }}">Districts</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.subdistricts.index') }}">Sub-Districts</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.villages.index') }}">Villages</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="mdi mdi-human-male-female menu-icon"></i>
                    <span class="menu-title">User Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                    <ul>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">List</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.permissions.index') }}">Permissions</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.roles.index') }}">Roles</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>