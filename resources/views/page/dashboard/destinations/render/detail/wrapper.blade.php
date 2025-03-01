<ul class="nav nav-tabs" id="destinationsTab-detail-destinations" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ $lang === 'en' ? 'active' : '' }}" id="english-tab-detail-destinations"
            data-bs-toggle="tab" data-bs-target="#english-detail-destinations" type="button" role="tab"
            aria-controls="english-detail-destinations" aria-selected="true">English (Default)</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ $lang === 'id' ? 'active' : '' }}" id="indonesia-tab-detail-destinations"
            data-bs-toggle="tab" data-bs-target="#indonesia-detail-destinations" type="button" role="tab"
            aria-controls="indonesia-detail-destinations" aria-selected="false">Indonesia</button>
    </li>
    <li class="nav-item ms-auto dropdown" role="presentation">
        <button class="nav-link" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="feather_icon" data-feather="more-vertical"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="dropdownMenuButton">
            <li>
                <a class="dropdown-item ajax_modal_btn" href="#" title="Edit"
                    data-modal-title="Edit destinations" data-modal-size="lg"
                    data-render-route="{{ route('dashboard.destinations.edit', $destinations->id) }}">
                    <i class="feather_icon color_theme" data-feather="edit"></i> <small>Edit</small>
                </a>
            </li>
            <li>
                <a class="dropdown-item ajax_modal_btn" href="#" title="Delete"
                    data-modal-title="Delete destinations"
                    data-render-route="{{ route('dashboard.destinations.delete', $destinations->id) }}">
                    <i class="feather_icon text-danger" data-feather="trash-2"></i> <small>Delete</small>
                </a>
            </li>
        </ul>
    </li>
</ul>
<div class="tab-content mb-3" id="destinationsTabContent-detail-destinations">
    <div class="tab-pane fade {{ $lang === 'en' ? 'show active' : '' }}" id="english-detail-destinations"
        role="tabpanel" aria-labelledby="english-tab-detail-destinations">
        @include('page.dashboard.destinations.render.detail.en')
    </div>
    <div class="tab-pane fade {{ $lang === 'id' ? 'show active' : '' }}" id="indonesia-detail-destinations"
        role="tabpanel" aria-labelledby="indonesia-tab-detail-destinations">
        @include('page.dashboard.destinations.render.detail.id')
    </div>
</div>
<div class="d-flex justify-content-end text-end">
    <div>
        <b>Created By :</b> <span>{{ $destinations->creator->full_name }}</span><br>
        <small>{{ $destinations->created_at }}</small>
    </div>
</div>


