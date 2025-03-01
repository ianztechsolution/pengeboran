@extends('layouts.dashboard')
@section('content')
    <div class="d-lg-flex justify-content-between align-items-center mb-4">
        <span class="fs-5 d-block mb-2 mb-lg-0" style="font-weight: 400">{{ $title }}</span>
        <div class="d-flex gap-2">
        <form class="d-flex gap-2" action="" method="get">
                <input type="search" class="form-control bg_transparent_1" name="search" id="search" placeholder="Search"
                    value="{{ request('search') }}" />

                <select class="form-select bg_transparent_1" name="availability" id="availability" onchange="this.form.submit()">
                    <option value="">Status</option>
                    <option value="available" {{ request('availability') == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="inavailable" {{ request('availability') == 'inavailable' ? 'selected' : '' }}>Inavailable</option>
                </select>
            </form>
            <button type="button" class="btn btn_theme ajax_modal_btn" title="Add" data-modal-title="Add Souvenir"
                data-modal-size="lg" data-render-route="{{ route('dashboard.souvenirs.create') }}">
                <i class="feather_icon" data-feather="plus"></i>
            </button>
        </div>
    </div>
    <div class="card bg_transparent_1">
        <div class="card-body">
            @if (config('app.locale') === 'en')
                @include('page.dashboard.souvenirs.table.en')
            @elseif (config('app.locale') === 'id')
                @include('page.dashboard.souvenirs.table.id')
            @endif
        </div>
        <div class="d-flex justify-content-end">
            {{ $souvenirs->links() }}
        </div>
    </div>
    </div>
@endsection
