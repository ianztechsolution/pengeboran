<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between">
        <b>Name:</b>
        <span>{{ $package_item->name_en }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Price:</b>
        <span>{!! \App\Helper\Helper::currencyFormatting($package_item->price_en, 'Rp. ') !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Minimum Order:</b>
        <span>{!! $package_item->minimum_order !!}</span>
    </li>
</ul>
