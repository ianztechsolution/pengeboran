<ul class="list-group">
    @if ($comments->images)
    <li class="list-group-item">
        <b class="d-block mb-2">Image:</b>
        <div class="row row-cols-3 row-cols-lg-4">
            @foreach ($comments->images as $image)
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
        <b>User:</b>
        <span>{{ $comments->usertable->full_name }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Rating:</b>
        <div>
            @for ($i = 0; $i < 5; $i++)
                @if ($i < $comments->rating)
                    <i class="feather_icon color_theme" data-feather="star" style="color: gold;"></i>
                @else
                    <i class="feather_icon color_theme" data-feather="star" style="color: lightgray;"></i>
                @endif
            @endfor
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Message:</b>
        <div>{!! $comments->message !!}</div>
    </li>
   
</ul>
