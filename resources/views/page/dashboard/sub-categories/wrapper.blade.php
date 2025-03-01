<div class="d-lg-flex justify-content-end align-items-center mb-4">
    <button type="button" class="btn btn_theme ajax_modal_btn" title="Add" data-modal-title="Add Sub Category - {{ $parent->title_en }}"
        data-modal-size="lg" data-render-route="{{ route('dashboard.sub-categories.create') }}?parent_id={{ $parent->id }}">
        <i class="feather_icon" data-feather="plus"></i>
    </button>
</div>

<div class="card bg_transparent_1">
    <div class="card-body">
        @if (config('app.locale') === 'en')
            @include('page.dashboard.sub-categories.table.en')
        @elseif (config('app.locale') === 'id')
            @include('page.dashboard.sub-categories.table.id')
        @endif
    </div>
    <div class="d-flex justify-content-end">
        {{ $sub_categories->links() }}
    </div>
</div>