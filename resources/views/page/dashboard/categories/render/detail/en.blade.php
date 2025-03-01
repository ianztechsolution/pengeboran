<ul class="list-group">
    @if ($category->image_icon)
        <li class="list-group-item">
            <b class="d-block mb-2">Icon:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                <div class="col mb-3">
                    <img src="{{ $category->image_icon }}" class="img-fluid" alt="Image">
                </div>
            </div>
        </li>
    @endif

    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Title:</b>
        <span>{!! $category->title_en !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Short Description:</b>
        <span>{{ $category->short_description_en }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Description:</b>
        <div>{!! $category->description_en !!}</div>
    </li>
</ul>
