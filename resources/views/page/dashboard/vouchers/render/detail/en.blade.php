<ul class="list-group">
        @if ($vouchers->images)
        <li class="list-group-item">
            <b class="d-block mb-2">Photo:</b>
            <div class="row row-cols-3 row-cols-lg-4">
                @foreach ($vouchers->images as $image)
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
        <b>Code:</b>
        <span>{{ $vouchers->code }}</span>
    </li>

    <li class="list-group-item d-flex justify-content-between">
        <b>Title:</b>
        <div>{!! $vouchers->title_en !!}</div>
    </li>

    <li class="list-group-item">
        <b>Products:</b>
        <div class="d-flex flex-wrap">
            @foreach ($products as $product)
                <span class="badge bg-primary me-2 mb-2">
                    {{ $product->name_en }}
                </span>
            @endforeach
        </div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Start Time:</b>
        <div>{!! $vouchers->start_time !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>End Time:</b>
        <div>{!! $vouchers->end_time !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Type:</b>
        <span>{{ ucwords(str_replace('_', ' ', $vouchers->type)) }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Apply Method:</b>
        <div>{{ ucwords(str_replace('_', ' ', $vouchers->apply_method)) }}</div>
    </li>
   
    <li class="list-group-item d-flex justify-content-between">
        <b>Period:</b>
        <div>{!! $vouchers->period_en !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Minimum Total Transaction en:</b>
        <div>{!! $vouchers->minimum_total_transaction_en !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Short Description:</b>
        <div>{!! $vouchers->short_description_en !!}</div>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Terms Condition:</b>
        <div>{!! $vouchers->terms_condition_en !!}</div>
    </li>
</ul>
