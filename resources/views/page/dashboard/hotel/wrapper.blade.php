@extends('layouts.dashboard')
@section('content')
    <div class="d-lg-flex justify-content-between align-items-center mb-4">
        <span class="fs-5 d-block mb-2 mb-lg-0" style="font-weight: 400">{{ $title }}</span>
        <div class="d-flex gap-2">
            <input type="search" class="form-control bg_transparent_1" name="search" id="search" placeholder="Search"
                value="{{ request('search') }}" />
            <button type="button" class="btn btn_theme ajax_modal_btn" title="Add" data-modal-title="Create Hotel Account"
                data-modal-size="lg" data-render-route="{{ route('dashboard.hotel.create') }}">
                <i class="feather_icon" data-feather="plus"></i>
            </button>
        </div>
    </div>
    <div class="card bg_transparent_1">
        <div class="card-body">
            @if (config('app.locale') === 'en')
                @include('page.dashboard.hotel.table.en')
            @elseif (config('app.locale') === 'id')
                @include('page.dashboard.hotel.table.id')
            @endif
        </div>
        <div class="d-flex justify-content-end">
            {{ $hotels->links() }}
        </div>
    </div>
    </div>
@endsection
