<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Title:</b>
        <span>{{ $subscription->title_en }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Short Description:</b>
        <span>{{ $subscription->note_en }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Price:</b>
        <span>{{ $subscription->price_en }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Duration:</b>
        <span>{{ $subscription->duration_day }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Status:</b>
        <span>{{$subscription->status}}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Start Date:</b>
        <span>{{ $subscription->start_date }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>End Date:</b>
        <span>{{ $subscription->end_date }}</span>
    </li>
</ul>
