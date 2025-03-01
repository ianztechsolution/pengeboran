<ul class="list-group">
    @if ($activity->images)
        <li class="list-group-item">
            <b class="d-block mb-2">Gambar:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                @foreach ($activity->images as $image)
                    @if ($image->path_id)
                        <div class="col mb-3">
                            <img src="{{ $image->path_id }}" class="img-fluid" alt="Image">
                        </div>
                    @endif
                @endforeach
            </div>
        </li>
    @endif
    <li class="list-group-item d-flex justify-content-between">
        <b>Kategori:</b>
        <span>{!! $activity->categories_list !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Judul:</b>
        <span>{!! $activity->title_id !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Harga:</b>
        <span>{{ \App\Helper\Helper::currencyFormatting($activity->price_id, 'Rp. ') }}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Jenis Harga:</b>
        <span>{{ ucwords($activity->price_type_id) }}</span>
    </li>  
    <li class="list-group-item d-flex justify-content-between">
        <b>Sorotan:</b>
        <span>{!! $activity->highlight_id !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi Singkat:</b>
        <span>{!! $activity->short_description_id !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi:</b>
        <span>{!! $activity->description_id !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Lokasi:</b>
        <span>{!! $activity->location_id !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Apa yang Harus Dibawa</b>
        <span>{!! $activity->what_to_bring_id !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Catatan:</b>
        <span>{!! $activity->note_id !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Waktu Penjemputan:</b>
        <span>{!! $activity->pickup_time_id !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Paket Detail Konfirmasi:</b>
        <span>{!! $activity->package_detail_confirmation_id !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Kebijakan Pembatalan Pembayaran:</b>
        <span>{!! $activity->payment_cancelation_policy_id !!}</span>
    </li> 
</ul>
