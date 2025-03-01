<ul class="nav nav-tabs" id="commentsTab-detail-comments" role="tablist">

    <li class="nav-item ms-auto dropdown" role="presentation">
        <button class="nav-link" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="feather_icon" data-feather="more-vertical"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="dropdownMenuButton">
            <li>
                <a class="dropdown-item ajax_modal_btn" href="#" title="Edit" data-modal-title="Edit comments"
                    data-modal-size="lg" data-render-route="{{ route('dashboard.comments.edit', $comments->id) }}">
                    <i class="feather_icon color_theme" data-feather="edit"></i> <small>Edit</small>
                </a>
            </li>
            <li>
                <a class="dropdown-item ajax_modal_btn" href="#" title="Delete" data-modal-title="Delete comments"
                    data-render-route="{{ route('dashboard.comments.delete', $comments->id) }}">
                    <i class="feather_icon text-danger" data-feather="trash-2"></i> <small>Delete</small>
                </a>
            </li>
        </ul>
    </li>
</ul>
<div class="tab-content mb-3" id="commentsTabContent-detail-comments">
    <div class="tab-pane fade {{ $lang === 'en' || $lang === 'id' ? 'show active' : '' }}" id="english-detail-comments" role="tabpanel"
        aria-labelledby="english-tab-detail-comments">
        @include('page.dashboard.comments.render.detail.en')
    </div>

</div>
<div class="d-flex justify-content-end text-end">
    <div>
        <b>Created By :</b> <span>{{ $comments->creator->full_name }}</span><br>
        <small>{{ $comments->created_at }}</small>
    </div>
</div>
