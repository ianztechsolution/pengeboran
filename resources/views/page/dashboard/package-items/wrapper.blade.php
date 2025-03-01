<div class="d-lg-flex justify-content-end align-items-center mb-4">
    <button type="button" class="btn btn_theme ajax_modal_btn" title="Add" data-modal-title="Add Package Item - {{ $package->name_en }}"
        data-modal-size="lg" data-render-route="{{ route('dashboard.package-items.create') }}?package_id={{ $package->id }}">
        <i class="feather_icon" data-feather="plus"></i>
    </button>
</div>

<div class="card bg_transparent_1">
    <div class="card-body">
        @if (config('app.locale') === 'en')
            @include('page.dashboard.package-items.table.en')
        @elseif (config('app.locale') === 'id')
            @include('page.dashboard.package-items.table.id')
        @endif
    </div>
    <div class="d-flex justify-content-end">
        {{ $package_items->links() }}
    </div>
</div>