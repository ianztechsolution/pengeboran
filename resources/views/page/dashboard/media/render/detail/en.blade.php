<ul class="list-group">
    @if($status === 'gallery foto')
    <li class="list-group-item d-flex flex-column justify-content-between border-top-0" style="border-radius: 0">
        <b>Photo:</b>
        @if (!empty($media->image_en))
            @if($media->type === 'image')
                <img src="{{ Storage::url($media->image_en) }}" alt="Image" style="width: 100%; height: 400px; object-fit: contain;">
            @else
                <img src="{{ $media->image_en }}" alt="Image" style="width: 100%; height: 400px; object-fit: contain;">
            @endif
        @endif
    </li>
    @endif

    @if($status === 'gallery video')
    <li class="list-group-item d-flex flex-column justify-content-between border-top-0" style="border-radius: 0">
        <b>Thumbnail:</b>
        @if (!empty($media->thumbnail_en))
        <img src="{{ Storage::url($media->thumbnail_en) }}" alt="Image" style="width: 100%; height: 400px; object-fit: contain;">
        @endif

    </li>
    <li class="list-group-item d-flex flex-column justify-content-between border-top-0" style="border-radius: 0">
        <b>Video:</b>
        @if (!empty($media->video_en))
            @if($media->type === 'video')
                <video controls style="width: 100%; height: 400px;">
                    <source src="{{ Storage::url($media->video_en) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                <div class="ratio ratio-16x9">
                    <iframe src="{{ $media->video_en }}" allowfullscreen  style="width: 100%; height: 400px;"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                </div>
            @endif
        @endif
    </li>
    @endif

    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Title:</b>
        <span>{{ $media->title_en }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Caption:</b>
        <span>{{ $media->caption_en }}</span>
    </li>
</ul>