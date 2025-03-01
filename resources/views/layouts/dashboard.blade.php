<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-image="img-1" data-sidebar-size="lg" data-preloader="disable" data-theme="default" data-topbar="light" data-bs-theme="light" data-theme-color="0">

@include('partials.dashboard.head')

<body>
    <div id="layout-wrapper">
        @include('partials.dashboard.sidebar')

        <div class="vertical-overlay"></div>
        @include('partials.dashboard.topbar')

        <div class="main-content">
            <div class="page-content wrapper">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('partials.dashboard.footer')

        </div>
    </div>

    <!--start back-to-top-->
    <button class="btn btn-dark btn-icon" id="back-to-top">
        <i class="bi bi-caret-up fs-3xl"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    
    @component('components.dashboard.common-offcanvas',['id'=>'common-offcanvas'])
    @endcomponent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/ajax.js') }}?v={{ env('APP_VERSION') }}"></script>
    @include('partials.dashboard.script')
</body>

</html>
