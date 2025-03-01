@extends('layouts.dashboard')
@section('content')
    <div class="d-lg-flex justify-content-between align-items-center mb-4">
        <span class="fs-5 d-block mb-2 mb-lg-0" style="font-weight: 400">{{ $title }}</span>
        <div class="d-flex gap-2">
            <input type="search" class="form-control bg_transparent_1" name="search" id="search" placeholder="Search"
                value="{{ request('search') }}" />

            <select class="form-select bg_transparent_1" name="status" id="status">
                <option value="">All</option>
                <option value="checking" {{ request('status') == 'checking' ? 'selected' : '' }}>Checking</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>Success</option>
                <option value="cancel" {{ request('status') == 'cancel' ? 'selected' : '' }}>Cancel</option>
                <option value="fail" {{ request('status') == 'fail' ? 'selected' : '' }}>Fail</option>
            </select>
                {{-- <button type="button" class="btn btn_theme ajax_modal_btn" title="Add" data-modal-title="Add Transaction"
                    data-modal-size="lg" data-render-route="{{ route('dashboard.transaction.create') }}">
                    <i class="feather_icon" data-feather="plus"></i>
                </button> --}}
        </div>
    </div>
    <div class="card bg_transparent_1">
        <div class="card-body">
            @if (config('app.locale') === 'en')
                @include('page.dashboard.transaction.table.en')
            @elseif (config('app.locale') === 'id')
                @include('page.dashboard.transaction.table.id')
            @endif
        </div>
        <div class="d-flex justify-content-end">
            {{-- {{ $informations->links() }} --}}
        </div>
    </div>
    </div>
@endsection
