@extends('layouts.dashboard')
@section('content')
    @if (auth()->user()->hasRole('admin'))
        @include('page.dashboard.dashboard.sections.admin-content')
    @else
        @include('page.dashboard.dashboard.sections.user-content')
    @endif
@endsection
