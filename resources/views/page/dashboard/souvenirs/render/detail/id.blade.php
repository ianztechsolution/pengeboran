<ul class="list-group">
    @if ($souvenir->images)
        <li class="list-group-item">
            <b class="d-block mb-2">Gambar:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                @foreach ($souvenir->images as $image)
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
        <span>{!! $souvenir->categories_list !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Judul:</b>
        <span>{!! $souvenir->title_id !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Harga:</b>
        <span>{{ \App\Helper\Helper::currencyFormatting($souvenir->price_id, 'Rp. ') }}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi Singkat:</b>
        <span>{!! $souvenir->short_description_id !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi:</b>
        <span>{!! $souvenir->description_id !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Catatan:</b>
        <span>{!! $souvenir->note_id !!}</span>
    </li> 
    
</ul>
