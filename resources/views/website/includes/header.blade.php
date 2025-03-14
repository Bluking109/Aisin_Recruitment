@php
    $url = url()->current();
@endphp

<header class="globalHeader forsticky new-header">
    <div class="globalHeaderInner">
        <div class="logo d-flex align-items-center gap-3">
            <a href="#">
                <img src="{{ asset('website/images/logo/Aisin.png') }}" alt="">
            </a>
            <span  class="logo">| Indonesia </span>
        </div>

        <!-- drawerMenu -->
        <div class="d-flex align-items-center justify-content-between" style="align-items: center">
            <div class="drawerMenu">
                <!-- megaNav -->
                <nav class="megaNav">
                    <ul class="megaNavParent" style="align-items: center">
                        <li class="menu-item @if ($url == route('job-vacancies.index')) active @endif">
                            <a href="{{ route('job-vacancies.index') }}" title="">Lowongan</a>
                        </li>
                        <li class="menu-item @if ($url == route('how-to-apply.index')) active @endif">
                            <a href="{{ route('how-to-apply.index') }}" title="">Cara Melamar</a>
                        </li>
                        @if (auth()->guard('job_seekers')->check())
                        <li class="menu-item my-profiles-sec">
                            <span class="container-profile">
                                <img src="{{ auth()->guard('job_seekers')->user()->photo ? route('profiles.personal-identity.getphoto') : asset('website/images/avatar/avatar.png') }}"
                                    class="profile-img" alt="Profile Image" />
                                <span class="user-name">{{ auth()->guard('job_seekers')->user()->name ?? 'User' }}</span>
                            </span>
                        </li>

                        @else
                            <div class="btn-extars">
                                <ul class="account-btns d-flex align-items-center" >
                                    <li class="signup-popup"><a href="#"><b><i class="fa fa-user"></i>
                                                Daftar</b></a></li>
                                    <li class="signin-popup"><a href="#"><b><i class="fa fa-sign-in"></i>
                                                Login</b></a></li>
                                </ul>
                            </div>
                        @endif
                    </ul>
                </nav>
            </div>

            <div class="d-none d-lg-flex align-items-center border-start border-dark-subtle px-2 mb-2 ms-5">
                <a href="#">
                    <img src="{{ asset('website/images/logo/satu-aisin-final.png') }}"
                        style="height: 40px; align-items:center;">
                </a>
            </div>
        </div>

    </div>
</header>
