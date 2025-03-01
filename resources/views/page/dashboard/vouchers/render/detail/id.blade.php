<ul class="list-group">
        @if ($vouchers->images)
        <li class="list-group-item">
            <b class="d-block mb-2">Foto:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                @foreach ($vouchers->images as $image)
                    @if ($image->path_id)
                        <div class="col mb-3">
                            <img src="{{ $image->path_id}}" class="img-fluid" alt="Image">
                        </div>
                    @endif
                @endforeach
            </div>
        </li>
    @endif

  
    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Code:</b>
        <span>{{ $vouchers->code }}</span>
    </li>

    <li class="list-group-item d-flex justify-content-between">
        <b>Judul:</b>
        <div>{!! $vouchers->title_id !!}</div>
    </li>

    <li class="list-group-item">
        <b>Produk:</b>
        <div class="d-flex flex-wrap">
            @foreach ($products as $product)
                <span class="badge bg-primary me-2 mb-2">
                    {{ $product->name_en }}
                </span>
            @endforeach
        </div>
    </li>

    <li class="list-group-item d-flex justify-content-between">
        <b>Waktu Mulai:</b>
        <div>{!! $vouchers->start_time !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Akhir Waktu:</b>
        <div>{!! $vouchers->end_time !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Type:</b>
        <span>{{ ucwords(str_replace('_', ' ', $vouchers->type)) }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Terapkan Metode:</b>
        <div>{{ ucwords(str_replace('_', ' ', $vouchers->apply_method)) }}</div>
    </li>
  
    <li class="list-group-item d-flex justify-content-between">
        <b>Periode:</b>
        <div>{!! $vouchers->period_id !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Total Transaksi Minimum:</b>
        <div>{!! $vouchers->minimum_total_transaction_id !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi Singkat:</b>
        <div>{!! $vouchers->short_description_id !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Syarat Ketentuan:</b>
        <div>{!! $vouchers->terms_condition_id !!}</div>
    </li>
</ul>
