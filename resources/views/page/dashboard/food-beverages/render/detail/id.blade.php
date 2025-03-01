<ul class="list-group">
    @if ($food_beverage->images)
        <li class="list-group-item">
            <b class="d-block mb-2">Gambar:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                @foreach ($food_beverage->images as $image)
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
        <span>{!! $food_beverage->categories_list !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Restoran:</b>
        <span>{!! $food_beverage->restaurant_link !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Judul:</b>
        <span>{!! $food_beverage->title_id !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Harga:</b>
        <span>{{ \App\Helper\Helper::currencyFormatting($food_beverage->price_id, 'Rp. ') }}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi Singkat:</b>
        <span>{!! $food_beverage->short_description_id !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi:</b>
        <span>{!! $food_beverage->description_id !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Catatan:</b>
        <span>{!! $food_beverage->note_id !!}</span>
    </li> 
    
</ul>
