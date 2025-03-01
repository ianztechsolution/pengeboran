<li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
    <a href="{{ route('dashboard') }}" class="sdlink a_reset">
        <i data-feather="home" class="feather_icon"></i>
        <span>Dashboard </span>
    </a>
</li>
<li>
    <div class="sb_sub_menu" data-bs-toggle="collapse" data-bs-target="#manajemen_sub_menu">
        <a href="javascript:void(0)" class="sdlink a_reset">
            <i data-feather="settings" class="feather_icon"></i>
            <span>Manajemen</span>
        </a>
        <i data-feather="chevron-right" class="feather_icon sb_collapse_icon"></i>
    </div>
</li>
<div class="collapse" id="manajemen_sub_menu">
    <ul class="sb_sub_menu_content">
        <li class="">
            <a href="" class="sdlink a_reset">Konfigurasi Sistem</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Hak Akses</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Pengguna</a>
        </li>
    </ul>
</div>
<li>
    <div class="sb_sub_menu" data-bs-toggle="collapse" data-bs-target="#data_sub_menu">
        <a href="javascript:void(0)" class="sdlink a_reset">
            <i data-feather="database" class="feather_icon"></i>
            <span>Data</span>
        </a>
        <i data-feather="chevron-right" class="feather_icon sb_collapse_icon"></i>
    </div>
</li>
<div class="collapse" id="data_sub_menu">
    <ul class="sb_sub_menu_content">
        <li class="">
            <a href="" class="sdlink a_reset">Monitoring Sistem</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Backup</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Restore</a>
        </li>
    </ul>
</div>