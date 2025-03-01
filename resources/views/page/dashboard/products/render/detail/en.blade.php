<ul class="list-group">
    @if ($product->images)
        <li class="list-group-item">
            <b class="d-block mb-2">Images:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                @foreach ($product->images as $image)
                    @if ($image->path_en)
                        <div class="col mb-3">
                            <img src="{{ $image->path_en }}" class="img-fluid" alt="Image">
                        </div>
                    @endif
                @endforeach
            </div>
        </li>
    @endif

    <li class="list-group-item d-flex justify-content-between">
        <b>Name:</b>
        <span>{{ $product->name_en }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Short Description:</b>
        <span>{!! $product->short_description_en !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Description:</b>
        <span>{!! $product->description_en !!}</span>
    </li>
</ul>
