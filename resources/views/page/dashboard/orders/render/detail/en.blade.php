<ul class="list-group">
    {{-- <li class="list-group-item d-flex flex-column justify-content-between border-top-0" style="border-radius: 0">
        <b>Gambar:</b>
        <img src="{{ asset('storage/' . $orders->photo_en) }}" alt="Banner" width="100%" height="400px">
    </li> --}}
    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Order Type:</b>
        <span>{{ $orders->orderable_type }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Order id:</b>
        <span>{{ $orders->orderable_id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Room Code:</b>
        <span>{{ $orders->room_code }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Customer Name:</b>
        <span>{{ $orders->customer_name }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Customer Phone:</b>
        <span>{{ $orders->customer_phone }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Status:</b>
        <div>{!! $orders->status !!}</div>
    </li>
</ul>
