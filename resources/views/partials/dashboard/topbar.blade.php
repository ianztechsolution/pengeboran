<div class="topbar-wrapper shadow">
    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box horizontal-logo">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{  asset('assets/images/logo-dark.png') }}" alt="" height="22">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{  asset('assets/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{  asset('assets/images/logo-light.png') }}" alt="" height="22">
                            </span>
                        </a>
                    </div>

                    <div class="header-item flex-shrink-0 me-3 vertical-btn-wrapper">
                        <button type="button"
                            class="btn btn-sm px-0 fs-xl vertical-menu-btn topnav-hamburger border hamburger-icon"
                            id="topnav-hamburger-icon">
                            <i class='bx bx-chevrons-right arrow-right'></i>
                            <i class='bx bx-chevrons-left arrow-left'></i>
                        </button>
                    </div>

                    <h4 class="mb-sm-0 header-item page-title lh-base">{{ $title }}</h4>
                </div>

                <div class="d-flex align-items-center">

                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                            data-toggle="fullscreen">
                            <i class='bx bx-fullscreen fs-3xl'></i>
                        </button>
                    </div>

                    <div class="dropdown topbar-head-dropdown ms-1 header-item">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle mode-layout"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-sun align-middle fs-3xl"></i>
                        </button>
                        <div class="dropdown-menu p-2 dropdown-menu-end" id="light-dark-mode">
                            <a href="#!" class="dropdown-item" data-mode="light"><i
                                    class="bx bx-sun align-middle me-2"></i> Default (light mode)</a>
                            <a href="#!" class="dropdown-item" data-mode="dark"><i
                                    class="bx bx-moon align-middle me-2"></i> Dark</a>
                            <a href="#!" class="dropdown-item" data-mode="auto"><i
                                    class="bx bx-desktop align-middle me-2"></i> Auto (system default)</a>
                        </div>
                    </div>
                    <div class="dropdown sidebar-user">
                        <button type="button" class="btn sidebar-user-button shadow-none w-100" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center overflow-hidden">
                                <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/32/avatar-1.jpg') }}"
                                    alt="Header Avatar">
                                <span class="text-start ms-xl-2 overflow-hidden flex-grow-1 sideba-user-content">
                                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text text-truncate mb-0"
                                        data-key="t-dixie-allen">{{ \Auth::user()->name }}</span>
                                    <span class="d-none d-xl-block ms-1 fs-sm user-name-sub-text" data-key="t-founder">{{ ucwords(implode(', ', \Auth::user()->roles()->pluck('name')->toArray())) }}</span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn_theme"><i
                                class="mdi mdi-logout text-muted fs-lg align-middle me-1"></i> <span class="align-middle"
                                data-key="t-logout">Keluar</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>