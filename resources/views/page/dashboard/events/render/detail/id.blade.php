<ul class="list-group">
    @if ($event->images)
        <li class="list-group-item">
            <b class="d-block mb-2">Gambar:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                @foreach ($event->images as $image)
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
        <b>Judul:</b>
        <span>{!! $event->title_id !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Tanggal Mulai:</b>
        <div>{!! $event->start_date !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Tanggal Akhir:</b>
        <div>{!! $event->end_date !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi Singkat:</b>
        <span>{!! $event->short_description_id !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi:</b>
        <span>{!! $event->description_id !!}</span>
    </li>     
</ul>
