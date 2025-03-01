@extends('layouts.dashboard')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xxl-12">
                    <form class="tablelist-form" action="{{ route('dashboard.transaction.invoices.update', $invoice->id) }}" method="post" class="ajax_form" data-after-submit="reload"
                enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label for="project_id" class="form-label">Proyek <span class="text-danger">*</span></label>
                            <select class="form-control bg-transparent" name="project_id" id="project_id" required>
                                <option value="">-- Pilih --</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" {{ (request()->project_id && $project->id == request()->project_id || empty(request()->project_id) && $invoice->project_id == $project->id) ? 'selected' : '' }}>{{ $project->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Pelanggan <span class="text-danger">*</span></label>
                            <input type="hidden" class="form-control" id="customer_id" name="customer_id" placeholder="Masukkan Pelanggan" readonly required="">
                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Masukkan Nama Pelanggan" readonly required="" value="{{ $invoice->customer->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="invoice_no" class="form-label">Nomor Tagihan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="invoice_no" name="invoice_no" placeholder="Masukkan Nomor Tagihan" readonly required="" value="{{ $invoice->invoice_no }}">
                        </div>

                        <div class="mb-3">
                            <label for="total_price" class="form-label">Total Harga <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="total_price" name="total_price" placeholder="Masukkan Total Harga" readonly required="" value="{{ $invoice->total_price }}">
                        </div>

                        <div class="mb-3">
                            <label for="dicount" class="form-label">Discount</label>
                            <input type="number" class="form-control" id="dicount" name="dicount" placeholder="Masukkan Diskon" value="{{ $invoice->discount ? $invoice->discount : 0 }}">
                        </div>

                        <div class="mb-3">
                            <label for="tax" class="form-label">Pajak</label>
                            <input type="number" class="form-control" id="tax" name="tax" placeholder="Masukkan Pajak" value="{{ $invoice->tax ? $invoice->tax : 0 }}">
                        </div>

                        <div class="mb-3">
                            <label for="grand_total" class="form-label">Total Tagihan <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="grand_total" name="grand_total" placeholder="Masukkan Total Tagihan" readonly required="" value="{{ $invoice->grand_total ? $invoice->grand_total : 0 }}">
                        </div>

                        <div class="mb-3">
                            <label for="total_payment" class="form-label">Total Dibayar</label>
                            <input type="number" class="form-control" id="total_payment" name="total_payment" placeholder="Masukkan Total Pembayaran" value="{{ $invoice->total_payment ? $invoice->total_payment : 0 }}">
                        </div>

                        <div class="mb-3">
                            <label for="paid_date" class="form-label">Tanggal Dibayar</label>
                            <input type="date" class="form-control" id="paid_date" name="paid_date" placeholder="Masukkan Tanggal Dibayar" value="{{ $invoice->paid_date }}">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control bg-transparent w-auto" name="status" id="status2" required>
                                <option value="">-- Pilih --</option>
                                <option value="WAITING_PAYMENT" {{ $invoice->status == 'WAITING_PAYMENT' ? 'selected' : '' }}>Belum dibayar</option>
                                <option value="PAID" {{ $invoice->status == 'PAID' ? 'selected' : '' }}>Sudah Bayar</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi">{!! $invoice->description !!}</textarea>
                        </div>

                        <div class="hstack gap-2 justify-content-end mb-3">
                            <a class="btn btn-primary" href="{{ route('dashboard.transaction.invoices.index') }}"> Kembali</a>
                            <button type="submit" class="btn btn-success" id="add-btn">Ubah Tagihan</button>
                        </div>
                    </form>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
$(document).ready(function() {

    
    var projectId = "{{ $invoice->project_id }}";
    setTimeout(function() {
        $.ajax({
            url: '/get-project-data/' + projectId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#customer_id').val(data.customer.id);
                $('#customer_name').val(data.customer.name);
            }
        });
    }, 300);

    $('#project_id').change(function() {
        var projectId = $(this).val();

        if (projectId) {
            $.ajax({
                url: '/get-project-data/' + projectId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#customer_id').val(data.customer.id);
                    $('#customer_name').val(data.customer.name);
                    $('#total_price').val(data.total_price);
                    $('#grand_total').val(data.total_price); // Assuming grand_total is initially the same as total_price
                }
            });
        } else {
            $('#customer_id').val('');
            $('#customer_name').val('');
            $('#total_price').val(0);
            $('#grand_total').val(0);
        }
    });

    $('#dicount').on('keyup blur', function() {
        var totalPrice = parseFloat($('#total_price').val());
        var discount = parseFloat($(this).val());
        var grandTotal = totalPrice - discount;
        $('#grand_total').val(grandTotal);
    });

    $('#tax').on('keyup blur', function() {
        var totalPrice = parseFloat($('#total_price').val());
        var discount = parseFloat($('#dicount').val());
        var tax = parseFloat($(this).val());
        var grandTotal = totalPrice - discount + tax;
        $('#grand_total').val(grandTotal);
    });
});
</script>
@endsection