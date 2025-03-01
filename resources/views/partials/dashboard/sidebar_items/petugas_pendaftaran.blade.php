<li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
    <a href="{{ route('dashboard') }}" class="sdlink a_reset">
        <i data-feather="home" class="feather_icon"></i>
        <span>Dashboard </span>
    </a>
</li>
<li>
    <div class="sb_sub_menu" data-bs-toggle="collapse" data-bs-target="#fnb_sub_menu">
        <a href="javascript:void(0)" class="sdlink a_reset">
            <i data-feather="file-plus" class="feather_icon"></i>
            <span>Pendaftaran</span>
        </a>
        <i data-feather="chevron-right" class="feather_icon sb_collapse_icon down"></i>
    </div>
</li>
<div class="collapse show" id="fnb_sub_menu">
    <ul class="sb_sub_menu_content">
        <li class="active">
            <a href="" class="sdlink a_reset">Pasien</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Antrian</a>
        </li>
        <li class="">
            <a href="" class="sdlink a_reset">Laporan</a>
        </li>
    </ul>
</div>