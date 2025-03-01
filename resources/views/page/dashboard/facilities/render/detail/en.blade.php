<ul class="list-group">
    @if ($facility->images)
        <li class="list-group-item">
            <b class="d-block mb-2">Images:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                @foreach ($facility->images as $image)
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
        <b>Title:</b>
        <span>{!! $facility->title_en !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Short Description:</b>
        <span>{!! $facility->short_description_en !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Description:</b>
        <span>{!! $facility->description_en !!}</span>
    </li> 
</ul>
