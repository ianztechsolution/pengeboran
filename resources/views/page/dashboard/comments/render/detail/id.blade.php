<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between">
        <b>Pengguna:</b>
        <span>{{ $comments->usertable->full_name }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Penilaian:</b>
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
        <b>Pesan:</b>
        <div>{!! $comments->message !!}</div>
    </li>
</ul>
