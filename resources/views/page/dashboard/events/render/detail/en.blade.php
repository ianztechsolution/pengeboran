<ul class="list-group">
    @if ($event->images)
        <li class="list-group-item">
            <b class="d-block mb-2">Images:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                @foreach ($event->images as $image)
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
        <span>{!! $event->title_en !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Start Date:</b>
        <div>{!! $event->start_date !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>End Date:</b>
        <div>{!! $event->end_date !!}</div>
    </li>

    <li class="list-group-item d-flex justify-content-between">
        <b>Short Description:</b>
        <span>{!! $event->short_description_en !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Description:</b>
        <span>{!! $event->description_en !!}</span>
    </li> 
</ul>
