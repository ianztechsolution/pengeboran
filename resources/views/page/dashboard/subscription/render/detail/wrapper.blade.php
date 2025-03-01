<ul class="nav nav-tabs" id="informationTab-detail-subscription" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ $lang === 'en' ? 'active' : '' }}" id="english-tab-detail-subscription"
            data-bs-toggle="tab" data-bs-target="#english-detail-subscription" type="button" role="tab"
            aria-controls="english-detail-subscription" aria-selected="true">English (Default)</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ $lang === 'id' ? 'active' : '' }}" id="indonesia-tab-detail-subscription"
            data-bs-toggle="tab" data-bs-target="#indonesia-detail-subscription" type="button" role="tab"
            aria-controls="indonesia-detail-subscription" aria-selected="false">Indonesia</button>
    </li>
    <li class="nav-item ms-auto dropdown" role="presentation">
        <button class="nav-link" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="feather_icon" data-feather="more-vertical"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="dropdownMenuButton">
            <li>
                <a class="dropdown-item ajax_modal_btn" href="#" title="Edit"
                    data-modal-title="Edit subscription" data-modal-size="lg"
                    data-render-route="{{ route('dashboard.subscription.edit', '$subscription->id') }}">
                    <i class="feather_icon color_theme" data-feather="edit"></i> <small>Edit</small>
                </a>
            </li>
            <li>
                <a class="dropdown-item ajax_modal_btn" href="#" title="Delete"
                    data-modal-title="Delete subscription"
                    data-render-route="{{ route('dashboard.subscription.delete', '$subscription->id') }}">
                    <i class="feather_icon text-danger" data-feather="trash-2"></i> <small>Delete</small>
                </a>
            </li>
        </ul>
    </li>
</ul>
<div class="tab-content mb-3" id="informationTabContent-detail-subscription">
    <div class="tab-pane fade {{ $lang === 'en' ? 'show active' : '' }}" id="english-detail-subscription" role="tabpanel"
        aria-labelledby="english-tab-detail-subscription">
        @include('page.dashboard.subscription.render.detail.en')
    </div>
    <div class="tab-pane fade {{ $lang === 'id' ? 'show active' : '' }}" id="indonesia-detail-subscription"
        role="tabpanel" aria-labelledby="indonesia-tab-detail-subscription">
        @include('page.dashboard.subscription.render.detail.id')
    </div>
</div>
<div class="d-flex justify-content-end text-end">
    <div>
        <b>Created By :</b> <span>Admin</span><br>
        <small>{{ $subscription->created_at }}</small>
    </div>
</div>
