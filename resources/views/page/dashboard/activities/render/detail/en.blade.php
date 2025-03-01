<ul class="list-group">
    @if ($activity->images)
        <li class="list-group-item">
            <b class="d-block mb-2">Images:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                @foreach ($activity->images as $image)
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
        <b>Category:</b>
        <span>{!! $activity->categories_list !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Title:</b>
        <span>{!! $activity->title_en !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Price:</b>
        <span>{{ \App\Helper\Helper::currencyFormatting($activity->price_en, '$ ', 'before', 2,'.',',') }}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Price Types:</b>
        <span>{{ ucwords($activity->price_type_en) }}</span>
    </li>  
    <li class="list-group-item d-flex justify-content-between">
        <b>Highlight:</b>
        <span>{!! $activity->highlight_en !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Short Description:</b>
        <span>{!! $activity->short_description_en !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Description:</b>
        <span>{!! $activity->description_en !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Location:</b>
        <span>{!! $activity->location_en !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>What to Bring:</b>
        <span>{!! $activity->what_to_bring_en !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Note:</b>
        <span>{!! $activity->note_en !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Pickup Time:</b>
        <span>{!! $activity->pickup_time_en !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Package Detail Confirmation:</b>
        <span>{!! $activity->package_detail_confirmation_en !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Payment Cancelation Policy:</b>
        <span>{!! $activity->payment_cancelation_policy_en !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Product:</b>
        <span>{!! $activity->product ? $activity->product->name_en : '' !!}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Gmap Link:</b>
        <span>{!! $activity->gmap_link !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Start Time:</b>
        <span>{!! $activity->start_time !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Minimum Slot:</b>
        <span>{!! $activity->minimum_slot !!}</span>
    </li> 
    <li class="list-group-item d-flex justify-content-between">
        <b>Duration Hour:</b>
        <span>{!! $activity->duration_hour !!}</span>
    </li> 
</ul>
