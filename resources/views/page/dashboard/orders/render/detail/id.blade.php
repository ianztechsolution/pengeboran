<ul class="list-group">

    <li class="list-group-item d-flex flex-column justify-content-between border-top-0" style="border-radius: 0">
        <b>Gambar:</b>
        <img src="{{ asset('storage/' . $orders->photo_id) }}" alt="Banner" width="100%" height="400px">
    </li>
    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Judul:</b>
        <span>{{ $orders->title_id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi Singkat:</b>
        <span>{{ $orders->short_description_id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi:</b>
        <div>{!! $orders->description_id !!}</div>
    </li>
</ul>
