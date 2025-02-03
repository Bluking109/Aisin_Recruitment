@php
    $url = url()->current();
@endphp

<header class="globalHeader forsticky new-header">
    <div class="globalHeaderInner">
        <div class="logo d-flex align-items-center gap-3">
            <a href="#">
                <img src="{{ asset('website/images/logo/Aisin.png') }}" alt="">
            </a>
            <span class="logo">| Indonesia</span>
        </div>

        <div class="d-flex align-items-center justify-content-between">
            <!-- Menu Utama -->
            <div class="drawerMenu">
                <nav class="megaNav">
                    <ul class="megaNavParent">
                        <!-- Menu About -->
                        <li class="parent">
                            <a href="{{ route('admin.home') }}">Dashboard</a>

                        </li>
                        <li>
                            <a href="{{ route('admin.job-vacancies.index') }}">Job Vacancy</a>
                        </li>
                        <!-- Menu Products -->
                        <li class="parent">
                            <a href="#">Job Seekers</a>
                            <div class="megaNavSlide">
                                <div class="megaNavSlideInner">

                                    <div class="megaNavContent">
                                        <ul>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.job-seekers.index') }}">List</a></li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.job-seekers.index', ['blacklist' => 1]) }}">Black
                                                    List</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- Menu Career -->


                        <!-- Menu Contact -->
                        <li class="parent">
                            <a href="#">Job Applications</a>
                            <div class="megaNavSlide">
                                <div class="megaNavSlideInner">

                                    <div class="megaNavContent">
                                        <ul>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.job-applications.in-process') }}">In
                                                    Process</a></li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.job-applications.accepted') }}">Accepted</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.job-applications.rejected') }}">Rejected</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.job-applications.assign') }}">Assign
                                                    Application</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @canany(['list_about', 'list_how_to_apply', 'list_announcement'])
                            <li class="parent">
                                <a href="#">Pages</a>
                                <div class="megaNavSlide">
                                    <div class="megaNavSlideInner">

                                        <div class="megaNavContent">
                                            <ul>
                                                @can('list_about')
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="{{ route('admin.about-us.index') }}">About</a>
                                                    </li>
                                                @endcan
                                                @can('list_how_to_apply')
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="{{ route('admin.how-to-applies.index') }}">How To
                                                            Apply</a></li>
                                                @endcan
                                                @can('list_announcement')
                                                    <li class="nav-item"><a class="nav-link"
                                                            href="{{ route('admin.announcements.index') }}">Announcement</a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endcanany
                        <li class="parent">
                            <a href="#">Master Data</a>
                            <div class="megaNavSlide">
                                <div class="megaNavSlideInner">

                                    <div class="megaNavContent">
                                        <ul>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.recruitment-stages.index') }}">Recruitment
                                                    Stage</a></li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.departments.index') }}">Departments</a></li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.sections.index') }}">Sections</a></li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.positions.index') }}">Positions</a></li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.education-levels.index') }}">Education
                                                    Levels</a></li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.majors.index') }}">Major</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.vendors.index') }}">Vendors</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.provinces.index') }}">Provinces</a></li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.districts.index') }}">Districts</a></li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.subdistricts.index') }}">Sub-Districts</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.villages.index') }}">Villages</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="parent">
                            <a href="#">User Management</a>
                            <div class="megaNavSlide">
                                <div class="megaNavSlideInner">

                                    <div class="megaNavContent">
                                        <ul>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.users.index') }}">List</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.permissions.index') }}">Permissions</a></li>
                                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('admin.roles.index') }}">Roles</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>


                <!-- Profile Dropdown -->
                <div class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                            id="profileDropdown" style="color: #00008B !important; font-weight: 600 !important;">

                            <img src="{{ asset('admin/images/avatar/avatar.jpg') }}" alt="profile"
                                class="rounded-circle" style="height: 30px; width: 30px; margin-left: 40px;" />
                                <span class="nav-profile-name">
                                    {{ auth()->user()->name }}
                                </span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ route('admin.AIIASettings.index') }}">
                                <i class="mdi mdi-settings text-primary"></i> Settings
                            </a>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout text-primary"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </div>

                <!-- Satu Aisin Logo -->
                <div class="d-none d-lg-flex align-items-center border-start border-dark-subtle px-2 ms-4">
                    <a href="#">
                        <img src="{{ asset('website/images/logo/satu-aisin-final.png') }}" alt="Satu Aisin Logo"
                            style="height: 50px;">
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
