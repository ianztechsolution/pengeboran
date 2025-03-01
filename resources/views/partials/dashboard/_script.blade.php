<script src="{{ asset('entercode-dashboard/vendor/jquery/dist/jquery.min.js') }}?v={{ env('APP_VERSION') }}"></script>
<script
    src="{{ asset('entercode-dashboard/vendor/bootstrap-5.3/dist/js/bootstrap.bundle.min.js') }}?v={{ env('APP_VERSION') }}">
</script>
<script src="{{ asset('entercode-dashboard/vendor/feather-icons/dist/feather.min.js') }}?v={{ env('APP_VERSION') }}">
</script>
<script src="{{ asset('entercode-dashboard/vendor/chart.js/dist/chart.umd.js') }}?v={{ env('APP_VERSION') }}"></script>
<script src="{{ asset('entercode-dashboard/vendor/select2/dist/js/select2.min.js') }}?v={{ env('APP_VERSION') }}">
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/44.0.0/ckeditor5.umd.js"></script>
<script src="{{ asset('entercode-dashboard/assets/js/script.js') }}?v={{ env('APP_VERSION') }}"></script>

<script src="{{ asset('alertifyjs/build/alertify.min.js') }}?v={{ env('APP_VERSION') }}"></script>
<script src="{{ asset('js/common.js') }}?v={{ env('APP_VERSION') }}"></script>
<script src="{{ asset('js/ajax.js') }}?v={{ env('APP_VERSION') }}"></script>
<script src="{{ asset('js/stores.js') }}?v={{ env('APP_VERSION') }}"></script>

@if (session('error'))
    <script>
        alertify.error("{{ session('error') }}")
    </script>
@endif
@if (session('success'))
    <script>
        alertify.success("{{ session('success') }}")
    </script>
@endif
@stack('js')
