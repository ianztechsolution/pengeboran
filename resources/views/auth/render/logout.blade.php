<div class="d-flex justify-content-center mb-4">
    <img src="{{ asset('image/exit.png') }}" class="w-50">
</div>
<form action="{{ route('logout') }}" method="post" class="ajax_form d-flex justify-content-center gap-3"
    data-after-submit="reload">
    @csrf
    <a href="javascript:void(0)" class="btn btn-secondary" onclick="$('#common-modal').modal('hide')">Batal</a>
    <button type="submit" class="btn btn_theme">Ya, Keluar !</button>
</form>
