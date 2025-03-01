<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Title:</b>
        <span>{{ $information->title_en }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Short Description:</b>
        <span>{{ $information->short_description_en }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Description:</b>
        <div>{!! $information->description_en !!}</div>
    </li>
    @if ($information->image_en)
        <li class="list-group-item">
            <b class="d-block mb-2">Image:</b>
            <div class="row row-cols-2 row-cols-lg-4">
                @foreach ($information->image_en as $image)
                    <div class="col mb-3">
                        <img src="{{ $image }}" class="img-fluid" alt="Image">
                    </div>
                @endforeach
            </div>
        </li>
    @endif
</ul>
