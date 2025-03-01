<ul class="list-group">
    <li class="list-group-item d-flex flex-column justify-content-between border-top-0" style="border-radius: 0">
        <b>Photo:</b>
        <img src="{{ Storage::url($banners->photo_en) }}" alt="Banner" style="width: 100%; height: 400px;">
    </li>
    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Title:</b>
        <span>{{ $banners->title_en }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Short Description:</b>
        <span>{{ $banners->short_description_en }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Description:</b>
        <div>{!! $banners->description_en !!}</div>
    </li>
</ul>
