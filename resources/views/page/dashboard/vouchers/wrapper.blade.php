@extends('layouts.dashboard')
@section('content')
    <div class="d-lg-flex justify-content-between align-items-center mb-4">
        <span class="fs-5 d-block mb-2 mb-lg-0" style="font-weight: 400">{{ $title }}</span>
        <div class="d-flex gap-2">
            <form class="d-flex gap-2" action="{{ route('dashboard.vouchers.index') }}" method="get">
                <input type="search" class="form-control bg_transparent_1" name="search" id="search" placeholder="Search"
                    value="{{ request('search') }}" />

                <select class="form-select bg_transparent_1" name="status" id="status" onchange="this.form.submit()">
                    <option value="">Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active
                    </option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive
                    </option>
                </select>
            </form>
            <button type="button" class="btn btn_theme ajax_modal_btn" title="Add" data-modal-title="Add Voucher"
                data-modal-size="lg" data-render-route="{{ route('dashboard.vouchers.create') }}">
                <i class="feather_icon" data-feather="plus"></i>
            </button>
        </div>
    </div>
    <div class="card bg_transparent_1">
        <div class="card-body">
            @if (config('app.locale') === 'en')
                @include('page.dashboard.vouchers.table.en')
            @elseif (config('app.locale') === 'id')
                @include('page.dashboard.vouchers.table.id')
            @endif
        </div>
        <div class="d-flex justify-content-end">
            {{ $vouchers->links() }}
        </div>
    </div>
    </div>
@endsection
