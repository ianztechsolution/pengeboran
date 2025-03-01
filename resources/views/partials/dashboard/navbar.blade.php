<div class="navbar d-flex justify-content-between">
    <div class="d-flex gap-3 align-items-center">
        <i class="feather_icon icon_btn" data-feather="menu" id="sidebar_toggle_icon"></i>
        {{-- <a href="#"><img
                src="{{ $app_setting->logo }}"
                class="nav_logo"></a>
        <input type="search" class="form-control d-none d-lg-block" style="height: 33px;" placeholder="Cari..."> --}}
    </div>
    <div class="d-flex gap-3 align-items-center">
        <i class="feather_icon icon_btn" data-feather="bell"></i>
        @if (auth()->user()->hasRole('admin'))
            <a href="" class="a_reset">
        @else
            <a href="" class="a_reset">
        @endif
            <i class="feather_icon icon_btn" data-feather="settings"></i>
        </a>
        <div class="d-flex gap-2 align-items-center nav_profile dropdown-toggle" id="profile_dropdown"
            data-bs-toggle="dropdown">
            <div class="photo">
                <img src="{{ asset('entercode-dashboard/assets/images/profile.jpg') }}?v={{ env('APP_VERSION') }}">
            </div>
            <span>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</span>
        </div>
        <div class="dropdown-menu dropdown-menu-end me-3 rounded-0 shadow-sm profile_dropdown"
            aria-labelledby="profile_dropdown">
            <a class="a_reset p-3 py-2 d-block" href=""><i class="feather_icon me-2 color_theme"
                    data-feather="user"></i>My Profile</a>
            <a class="a_reset p-3 py-2 d-block" href=""><i class="feather_icon me-2 color_theme"
                    data-feather="key"></i>Account</a>
            <div class="dropdown-divider"></div>
            <a class="a_reset p-3 py-2 d-block ajax_modal_btn" href="javascript:void(0)" data-modal-title="Keluar dari aplikasi ?"
            data-render-route="{{ route('render.logout') }}"><i class="feather_icon me-2 color_theme"
                    data-feather="log-out"></i>Logout</a>
        </div>

    </div>
  
</div>
