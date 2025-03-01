<ul class="list-group">
    @if ($sub_category->image_icon)
        <li class="list-group-item">
            <b class="d-block mb-2">Ikon:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                <div class="col mb-3">
                    <img src="{{ $sub_category->image_icon }}" class="img-fluid" alt="Image">
                </div>
            </div>
        </li>
    @endif

    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Judul:</b>
        <span>{!! $sub_category->title_id !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Induk:</b>
        <td>{!! $sub_category->parent->parent_link !!}</td>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi Singkat:</b>
        <span>{{ $sub_category->short_description_id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi:</b>
        <div>{!! $sub_category->description_id !!}</div>
    </li>
</ul>
