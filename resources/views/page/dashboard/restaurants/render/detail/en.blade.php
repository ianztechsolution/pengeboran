<ul class="list-group">
    @if ($restaurant->image_icon)
        <li class="list-group-item">
            <b class="d-block mb-2">Icon:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                <div class="col mb-3">
                    <img src="{{ $restaurant->image_icon }}" class="img-fluid" alt="Image">
                </div>
            </div>
        </li>
    @endif

    @if ($restaurant->images)
        <li class="list-group-item">
            <b class="d-block mb-2">Images:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                @foreach ($restaurant->images as $image)
                    @if ($image->path_en)
                        <div class="col mb-3">
                            <img src="{{ $image->path_en }}" class="img-fluid" alt="Image">
                        </div>
                    @endif
                @endforeach
            </div>
        </li>
    @endif

    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Name:</b>
        <span>{!! $restaurant->name_en !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Short Description:</b>
        <span>{{ $restaurant->short_description_en }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Description:</b>
        <div>{!! $restaurant->description_en !!}</div>
    </li>
</ul>
