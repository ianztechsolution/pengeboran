<ul class="list-group">
    <li class="list-group-item d-flex flex-column justify-content-between border-top-0" style="border-radius: 0">
        <b>Hotel Icon:</b>
        <div class="d-flex align-content-center flex-wrap gap-2">
            <div class="image-container" style="position: relative; display: inline-block; text-align: center;">
                <img src="{{ $hotel->settings->business_icon ?? ''}}" alt="Image" width="100px" height="100%">
            </div>
        </div>
    </li>
    <li class="list-group-item d-flex flex-column justify-content-between border-top-0" style="border-radius: 0">
        <b>Hotel Logo:</b>
        <div class="d-flex align-content-center flex-wrap gap-2">
            <div class="image-container" style="position: relative; display: inline-block; text-align: center;">
                <img src="{{ $hotel->settings->business_logo ?? ''}}" alt="Image" width="100px" height="100%">
            </div>
        </div>
    </li>
  
    <li class="list-group-item d-flex justify-content-between">
        <b>Hotel Address:</b>
        <span>{{ $hotel->settings->business_address ?? 'Hotel address has not been set' }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Hotel About:</b>
        <div>{!! $hotel->settings->business_about ?? 'Hotel about has not been set' !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Hotel Gmap Link:</b>
        <span>{{ $hotel->settings->business_gmap_link ?? 'Hotel gmap link has not been set' }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Hotel Phone:</b>
        <span>{{ $hotel->settings->business_phone ?? 'Hotel phone has not been set' }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Hotel Email:</b>
        <span>{{ $hotel->settings->business_email ?? 'Hotel email has not been set' }}</span>
    </li>
 
</ul>
