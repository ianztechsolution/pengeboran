<div class="tab-content mb-3" id="informationTabContent-detail-hotel">
    <div class="tab-pane fade {{ $lang === 'en' ? 'show active' : '' }}" id="english-detail-hotel" role="tabpanel"
        aria-labelledby="english-tab-detail-hotel">
        @include('page.dashboard.hotel.render.detail.en')
    </div>
    <div class="tab-pane fade {{ $lang === 'id' ? 'show active' : '' }}" id="indonesia-detail-hotel"
        role="tabpanel" aria-labelledby="indonesia-tab-detail-hotel">
        @include('page.dashboard.hotel.render.detail.id')
    </div>
</div>
<div class="d-flex justify-content-end text-end">
    <div>
        <b>Created By :</b> <span>{{ $hotel->settings->creator->full_name }}</span><br>
        <small>{{ $hotel->created_at }}</small>
    </div>
</div>
