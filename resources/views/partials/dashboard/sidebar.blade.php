<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <h6 class="text-dark m-4">PT. KJM</h6>
            </span>
            <span class="logo-lg">
                <h6 class="text-dark m-4">PT. KARYA JATI MAKMUR</h6>
            </span>
        </a>

        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <h6 class="text-light m-4">PT. KJM</h6>
            </span>
            <span class="logo-lg">
                <h6 class="text-light m-4">PT. KARYA JATI MAKMUR</h6>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
        <div class="vertical-menu-btn-wrapper header-item vertical-icon">
            <button type="button" class="btn btn-sm px-0 fs-xl vertical-menu-btn topnav-hamburger shadow hamburger-icon"
                id="topnav-hamburger-icon">
                <i class='bx bx-chevrons-right'></i>
                <i class='bx bx-chevrons-left'></i>
            </button>
        </div>
    </div>


    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"> 
                        <i class="bx bx-home"></i> 
                        <span data-key="t-home">Dashboard</span> 
                    </a>
                </li>
                @if(auth()->user()->hasRole('admin'))
                    <li class="nav-item">
                        <a href="#sidebarMasterData" class="nav-link menu-link {{ request()->routeIs('dashboard.master-data.service-types.*') || request()->routeIs('dashboard.master-data.payment-channels.*') ? 'collapse' : 'collapsed' }} " data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarMasterData">
                            <i class="bx bx-list-ul"></i> <span data-key="t-list">Master Data</span>
                        </a>
                        <div class="collapse menu-dropdown {{ request()->routeIs('dashboard.master-data.service-types.*') || request()->routeIs('dashboard.master-data.payment-channels.*') ? 'show' : '' }}" id="sidebarMasterData">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ request()->routeIs('dashboard.master-data.service-types.*') ? 'active' : '' }}">
                                    <a href="{{ route('dashboard.master-data.service-types.index') }}" class="nav-link {{ request()->routeIs('dashboard.master-data.service-types.*') ? 'active' : '' }}" data-key="t-jenis-layanan">Jenis Layanan</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('dashboard.master-data.payment-channels.*') ? 'active' : '' }}">
                                    <a href="{{ route('dashboard.master-data.payment-channels.index') }}" class="nav-link {{ request()->routeIs('dashboard.master-data.payment-channels.*') ? 'active' : '' }}" data-key="t-payment-channels">Metode Pembayaran</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('dashboard.transaction.projects.*') ? 'collapse' : 'collapsed' }}" href="#sidebarProyek" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarProyek">
                        <i class="bx bx-network-chart"></i> <span data-key="t-proyek">Proyek</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->routeIs('dashboard.transaction.projects.*') ? 'show' : '' }}" id="sidebarProyek">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.transaction.projects.index') }}" class="nav-link {{ request()->routeIs('dashboard.transaction.projects.*') && request()->get('status') === null ? 'active' : '' }}" data-key="t-proyek-semua"> Semua
                                </a>
                            </li>
                            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('customer'))

                                <li class="nav-item">
                                    <a href="{{ route('dashboard.transaction.projects.index') }}?status=REQUEST_APPROVAL" class="nav-link {{ request()->routeIs('dashboard.transaction.projects.*') && request()->get('status') === 'REQUEST_APPROVAL' ? 'active' : '' }}" data-key="t-proyek-approval"> Persetujuan Layanan
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('dashboard.transaction.projects.index') }}?status=WAITING_PAYMENT" class="nav-link {{ request()->routeIs('dashboard.transaction.projects.*') && request()->get('status') === 'WAITING_PAYMENT' ? 'active' : '' }}" data-key="t-proyek-waiting-payment"> Menunggu Pembayaran
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('dashboard.transaction.projects.index') }}?status=SCHEDULED" class="nav-link {{ request()->routeIs('dashboard.transaction.projects.*') && request()->get('status') === 'SCHEDULED' ? 'active' : '' }}"
                                    data-key="t-proyek-jadwal"> Penjadwalan </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.transaction.projects.index') }}?status=DONE" class="nav-link {{ request()->routeIs('dashboard.transaction.projects.*') && request()->get('status') === 'DONE' ? 'active' : '' }}" data-key="t-proyek-done"> Selesai </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.transaction.projects.index') }}?status=CANCELED" class="nav-link {{ request()->routeIs('dashboard.transaction.projects.*') && request()->get('status') === 'CANCELED' ? 'active' : '' }}" data-key="t-proyek-cancel"> Dibatalkan </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('customer'))
                    <li class="nav-item">
                        <a href="#sidebarInvoices" class="nav-link menu-link {{ request()->routeIs('dashboard.transaction.invoices.*') ? 'show' : '' }}" data-bs-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="sidebarInvoices">
                            <i class="bx bx-file"></i> <span data-key="t-invoices">Tagihan</span>
                        </a>
                        <div class="collapse menu-dropdown {{ request()->routeIs('dashboard.transaction.invoices.*') ? 'show' : '' }}" id="sidebarInvoices">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.transaction.invoices.index') }}" class="nav-link {{ request()->routeIs('dashboard.transaction.invoices.*') && request()->get('status') === null ? 'active' : '' }}" data-key="t-invoice-all">Semua</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.transaction.invoices.index') }}?status=WAITING_PAYMENT" class="nav-link {{ request()->routeIs('dashboard.transaction.invoices.*') && request()->get('status') === 'WAITING_PAYMENT' ? 'active' : '' }}"
                                        data-key="t-invoice-waiting-payment">Belum Dibayar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.transaction.invoices.index') }}?status=PAID" class="nav-link {{ request()->routeIs('dashboard.transaction.invoices.*') && request()->get('status') === 'PAID' ? 'active' : '' }}" data-key="t-invoice-paid">Sudah Dibayar</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('technician'))

                    <li class="nav-item">
                        <a href="{{ route('dashboard.reports.index') }}" class="nav-link menu-link  {{ request()->routeIs('dashboard.reports.*') ? 'active': '' }}"> <i class="bx bx-file"></i> <span
                                data-key="t-report">Laporan</span> </a>
                    </li>
                @endif
                @if(auth()->user()->hasRole('admin'))

                    <li class="nav-item">
                        <a class="nav-link menu-link {{ request()->routeIs('dashboard.transaction.users.*') ? 'collapse' : 'collapsed' }}" href="#sidebarAuth" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarAuth">
                            <i class="bx bx-user-circle"></i> <span data-key="t-authentication">Manajemen Pengguna</span>
                        </a>
                        <div class="collapse menu-dropdown {{ request()->routeIs('dashboard.transaction.users.*') ? 'show' : '' }}" id="sidebarAuth">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.transaction.users.index') }}?role=CUSTOMER" class="nav-link {{ request()->routeIs('dashboard.transaction.users.*') && request()->get('role') === 'CUSTOMER' ? 'active' : '' }}" role="button" data-key="t-customers"> Pelanggan
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.transaction.users.index') }}?role=TECHNICIAN" class="nav-link {{ request()->routeIs('dashboard.transaction.users.*') && request()->get('role') === 'TECHNICIAN' ? 'active' : '' }}" role="button" data-key="t-technician"> Teknisi
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('dashboard.transaction.users.index') }}?role=ADMIN" class="nav-link {{ request()->routeIs('dashboard.transaction.users.*') && request()->get('role') === 'ADMIN' ? 'active' : '' }}" role="button"
                                        data-key="t-admin">
                                        Administrator
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>