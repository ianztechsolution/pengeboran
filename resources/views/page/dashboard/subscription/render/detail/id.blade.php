<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between border-top-0" style="border-radius: 0">
        <b>Judul:</b>
        <span>{{ $subscription->title_id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Deskripsi Singkat:</b>
        <span>{{ $subscription->note_id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Harga:</b>
        <span>{{ $subscription->price_id }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Durasi:</b>
        <span>{{ $subscription->duration_day }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Status:</b>
        <span>{{$subscription->status}}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Tanggal Dimulai:</b>
        <span>{{ $subscription->start_date }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <b>Tanggal Berakhir:</b>
        <span>{{ $subscription->end_date }}</span>
    </li>
   
</ul>
