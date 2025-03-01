<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between">
        <b>Nama:</b>
        <span>{{ $package_item->name_id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Harga:</b>
        <span>{!! \App\Helper\Helper::currencyFormatting($package_item->price_id, 'Rp. ') !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Minimum Order:</b>
        <span>{!! $package_item->minimum_order !!}</span>
    </li>
</ul>
