<ul class="nav nav-tabs" id="informationTab-detail-information" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ $lang === 'en' ? 'active' : '' }}" id="english-tab-detail-information"
            data-bs-toggle="tab" data-bs-target="#english-detail-information" type="button" role="tab"
            aria-controls="english-detail-information" aria-selected="true">English (Default)</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ $lang === 'id' ? 'active' : '' }}" id="indonesia-tab-detail-information"
            data-bs-toggle="tab" data-bs-target="#indonesia-detail-information" type="button" role="tab"
            aria-controls="indonesia-detail-information" aria-selected="false">Indonesia</button>
    </li>
    <li class="nav-item ms-auto dropdown" role="presentation">
        <button class="nav-link" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="feather_icon" data-feather="more-vertical"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="dropdownMenuButton">
            <li>
                <a class="dropdown-item ajax_modal_btn" href="#" title="Edit"
                    data-modal-title="Edit Category" data-modal-size="lg"
                    data-render-route="{{ route('dashboard.activities.edit', $activity->id) }}">
                    <i class="feather_icon color_theme" data-feather="edit"></i> <small>Edit</small>
                </a>
            </li>
            <li>
                <a class="dropdown-item ajax_modal_btn" href="#" title="Delete"
                    data-modal-title="Delete Category"
                    data-render-route="{{ route('dashboard.activities.delete', $activity->id) }}">
                    <i class="feather_icon text-danger" data-feather="trash-2"></i> <small>Delete</small>
                </a>
            </li>
        </ul>
    </li>
</ul>
<div class="tab-content mb-3" id="informationTabContent-detail-information">
    <div class="tab-pane fade {{ $lang === 'en' ? 'show active' : '' }}" id="english-detail-information" role="tabpanel"
        aria-labelledby="english-tab-detail-information">
        @include('page.dashboard.activities.render.detail.en')
    </div>
    <div class="tab-pane fade {{ $lang === 'id' ? 'show active' : '' }}" id="indonesia-detail-information"
        role="tabpanel" aria-labelledby="indonesia-tab-detail-information">
        @include('page.dashboard.activities.render.detail.id')
    </div>
</div>
<div class="d-flex justify-content-end text-end">
    <div>
        <b>Created By :</b> <span>{{ $activity->creator->full_name }}</span><br>
        <small>{{ $activity->created_at }}</small>
    </div>
</div>
