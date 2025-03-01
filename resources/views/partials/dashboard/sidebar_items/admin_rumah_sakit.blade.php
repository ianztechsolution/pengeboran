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
            <a href="" class="sdlink a_reset">Asset</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Unit & Layanan</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Pegawai</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Tenaga Medis</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Jadwal</a>
        </li>
    </ul>
</div>
<li>
    <div class="sb_sub_menu" data-bs-toggle="collapse" data-bs-target="#monitoring_sub_menu">
        <a href="javascript:void(0)" class="sdlink a_reset">
            <i data-feather="monitor" class="feather_icon"></i>
            <span>Monitoring</span>
        </a>
        <i data-feather="chevron-right" class="feather_icon sb_collapse_icon"></i>
    </div>
</li>
<div class="collapse" id="monitoring_sub_menu">
    <ul class="sb_sub_menu_content">
        <li class="">
            <a href="" class="sdlink a_reset">Pasien</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Unit Layanan</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Dokter</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Tenaga Medis</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Fasilitas</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Keuangan</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Obat & Farmasi</a>
        </li>
    </ul>
</div>