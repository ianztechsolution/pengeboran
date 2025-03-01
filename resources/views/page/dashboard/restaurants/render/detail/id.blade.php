<ul class="list-group">
    @if ($restaurant->image_icon)
        <li class="list-group-item">
            <b class="d-block mb-2">Ikon:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                <div class="col mb-3">
                    <img src="{{ $restaurant->image_icon }}" class="img-fluid" alt="Image">
                </div>
            </div>
        </li>
    @endif

    @if ($restaurant->images)
        <li class="list-group-item">
            <b class="d-block mb-2">Gambar:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                @foreach ($restaurant->images as $image)
                    @if ($image->path_id)
                        <div class="col mb-3">
                            <img src="{{ $image->path_id }}" class="img-fluid" alt="Image">
                        </div>
                    @endif
                @endforeach
            </div>
        </li>
    @endif

    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Nama:</b>
        <span>{!! $restaurant->name_id !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi Singkat:</b>
        <span>{{ $restaurant->short_description_id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi:</b>
        <div>{!! $restaurant->description_id !!}</div>
    </li>
</ul>
