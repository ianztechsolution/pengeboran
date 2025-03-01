@extends('layouts.dashboard')
@section('content')
    <div class="d-lg-flex justify-content-between align-items-center mb-4">
        <span class="fs-5 d-block mb-2 mb-lg-0" style="font-weight: 400">{{ $title }}</span>
        <div class="d-flex gap-2">
            <form class="d-flex gap-2" action="{{ route('dashboard.orders.index') }}" method="get">
                <input type="search" class="form-control bg_transparent_1" name="search" id="search" placeholder="Search"
                    value="{{ request('search') }}" />

                <select class="form-select bg_transparent_1" name="status" id="status" onchange="this.form.submit()">
                    <option value="">Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending
                    </option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed
                    </option>
                    <option value="on process" {{ request('status') == 'on process' ? 'selected' : '' }}>On process
                    </option>
                    <option value="on process" {{ request('status') == 'on delivery' ? 'selected' : '' }}>On delivery
                    </option>
                    <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done
                    </option>
                </select>
            </form>
            <button type="button" class="btn btn_theme ajax_modal_btn" title="Add" data-modal-title="Add Order"
                data-modal-size="lg"
                data-render-route="{{ route('dashboard.orders.create', ['orderable' => 'activities']) }}">
                <i class="feather_icon" data-feather="plus"></i>
            </button>
        </div>
    </div>
    <div class="card bg_transparent_1">
        <div class="card-body">
            @include('page.dashboard.orders.table')
        </div>
        <div class="d-flex justify-content-end">
            {{ $orders->links() }}
        </div>
    </div>
    </div>
@endsection
