<ul class="list-group">
    @if ($destinations->images)
        <li class="list-group-item">
            <b class="d-block mb-2">Foto:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                @foreach ($destinations->images as $image)
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
        <b>Judul:</b>
        <span>{{ $destinations->title_id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Lokasi:</b>
        <div>{!! $destinations->location_id !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Jarak:</b>
        <div>{!! $destinations->distance_id !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi Singkat:</b>
        <span>{{ $destinations->short_description_id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi:</b>
        <div>{!! $destinations->description_id !!}</div>
    </li>
</ul>
