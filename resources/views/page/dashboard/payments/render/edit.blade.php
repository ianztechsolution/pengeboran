@extends('layouts.dashboard')
@section('content')
<style>
    .image_delete_button {
    transition: 0.3s;
    position: relative;
    overflow: hidden;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: auto;
}

.image_delete_button img {
    object-fit: cover;
    width: 100%;
    height: 100%
}
.image_delete_button:hover::after {
    content: "Delete";
    position: absolute;
    color: white;
    font-size: 14px;
    background: rgb(255, 76, 76);
    padding: 5px 10px;
    border-radius: 5px;
}

</style>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="modal-body">
                        <form class="tablelist-form" action="{{ route('dashboard.transaction.payments.update', $payment->id) }}" method="post" class="ajax_form" data-after-submit="reload"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="project_id" class="form-control" value="{{ $project ? $project->id : NULL }}" required="">
                        <input type="hidden" name="invoice_id" class="form-control" value="{{ $invoice ? $invoice->id : NULL }}" required="">

                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Pelanggan <span class="text-danger">*</span></label>
                            <input type="hidden" class="form-control" id="customer_id" name="customer_id" placeholder="Masukkan Nama" required="" value="{{ $project->customer->id }}">
                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Masukkan Nama" disabled required="" value="{{ $project->customer->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="project_name" class="form-label">Proyek <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Masukkan Nama Proyek" disabled required="" value="{{ $project->title }}">
                        </div>

                        <div class="mb-3">
                            <label for="total_unpaid" class="form-label">Jumlah yang harus dibayar <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="total_unpaid" name="total_unpaid" required="" disabled value="{{ $invoice->grand_total }}">
                        </div>

                        <div class="mb-3">
                            <label for="total_payment-field" class="form-label">Total Bayar <span class="text-danger">*</span></label>
                            <input type="number" name="total_payment" id="total_payment-field" class="form-control" placeholder="Masukkan Total Bayar" required="" value="{{ $payment->total_payment }}">
                        </div>


                        <div class="mb-3">
                            <label for="paid_date-field" class="form-label">Tanggal Bayar <span class="text-danger">*</span></label>
                            <input type="date" name="paid_date" id="paid_date-field" class="form-control" placeholder="Masukkan Tanggal Bayar" required="" value="{{ $payment->paid_date }}">
                        </div>

                        <div class="mb-3">
                            <label for="description-field" class="form-label">Deskripsi</label>
                            <textarea id="description" name="description" class="form-control">{!! $payment->description !!}</textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 col-lg-12">
                                <label for="images" class="required">Bukti Bayar</label>
                                <input type="file" class="form-control" name="images[]" accept=".jpeg,.jpg,.png,.webp,.gif" id="image"  multiple>
                                @if ($payment->medias)
                                    <div class="row row-cols-3 row-cols-lg-4">
                                        @foreach ($payment->medias as $image)
                                            @if ($image->path)
                                                <div class="col mt-3">
                                                    <div class="image_delete_button"
                                                        data-route="{{ route('image.destroy-by-path', ['image' => $image->id]) }}">
                                                        <img src="{{ $image->path }}" alt="Image">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status-field" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control" data-trigger="" name="status" id="status-field">
                                <option value="">Status</option>
                                <option value="WAITING_PAYMENT" {{ $payment->status == 'WAITING_PAYMENT' ? 'selected' : '' }}>Belum Bayar</option>
                                <option value="PAID" {{ $payment->status == 'PAID' ? 'selected' : '' }}>Sudah Bayar</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="display: block;">
                        <div class="hstack gap-2 justify-content-end">
                            <a class="btn btn-primary" href="{{ route('dashboard.transaction.projects.edit', $project->id) }}"> Kembali</a>
                            <button type="submit" class="btn btn-success" id="add-btn">Kirim</button>
                        </div>
                    </div>
                    </form>

                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
$(document).on("click", ".image_delete_button", function (event) {
    event.preventDefault();

    if (confirm("Are you sure you want to delete this image?")) {

        // Disable button
        let btn = $('#form-update').find('button[type=submit]');
        btn.addClass('disabled');
        let btn_html = btn.html();
        let spinner =
            btn_html +
            '<span class="spinner-border spinner-border-sm ms-2" role="status" aria-hidden="true"></span>';
        btn.html(spinner);

        $(this).hide();
        let route = $(this).data("route");
        let token = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            url: route,
            type: "DELETE",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            success: function (response) {
                alert("Image deleted successfully.");

                // show back the save button button
                btn.html(btn_html);
                btn.removeClass('disabled');
            },
            error: function (xhr) {
                alert("Failed to delete image.");
                $(this).show();
            },
        });
    }
});
</script>

@endsection