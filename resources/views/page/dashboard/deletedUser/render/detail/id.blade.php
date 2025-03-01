<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Judul:</b>
        <span>{{ $information->title_id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi Singkat:</b>
        <span>{{ $information->short_description_id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi:</b>
        <div>{!! $information->description_id !!}</div>
    </li>
    @if ($information->image_id)
        <li class="list-group-item">
            <b class="d-block mb-2">Gambar:</b>
            <div class="row row-cols-2 row-cols-lg-4">
                @foreach ($information->image_id as $image)
                    <div class="col mb-3">
                        <img src="{{ $image }}" class="img-fluid" alt="Gambar">
                    </div>
                @endforeach
            </div>
        </li>
    @endif
</ul>
