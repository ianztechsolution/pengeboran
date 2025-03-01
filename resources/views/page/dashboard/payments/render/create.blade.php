@extends('layouts.dashboard')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xxl-12">
                    <form class="tablelist-form" action="{{ route('dashboard.transaction.payments.store') }}" method="post" class="ajax_form" data-after-submit="reload"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
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
                                <input type="text" class="form-control" id="total_unpaid" name="total_unpaid" disabled required="" value="{{ $invoice->grand_total }}">
                            </div>

                            <div class="mb-3">
                                <label for="total_payment-field" class="form-label">Total Bayar <span class="text-danger">*</span></label>
                                <input type="number" name="total_payment" id="total_payment-field" class="form-control" placeholder="Masukkan Total Bayar" required="">
                            </div>

                            
                            <div class="mb-3">
                                <label for="paid_date-field" class="form-label">Tanggal Bayar <span class="text-danger">*</span></label>
                                <input type="date" name="paid_date" id="paid_date-field" class="form-control" placeholder="Masukkan Tanggal Bayar" required="">
                            </div>

                            <div class="mb-3">
                                <label for="description-field" class="form-label">Deskripsi</label>
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12 col-lg-8">
                                    <label for="images" class="required">Bukti Bayar</label>
                                    <input type="file" class="form-control" name="images[]" accept=".jpeg,.jpg,.png,.webp,.gif" id="image" multiple>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="status-field" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-control" data-trigger="" name="status" id="status-field">
                                    <option value="">Status</option>
                                    <option value="WAITING_PAYMENT">Belum Bayar</option>
                                    <option value="PAID">Sudah Bayar</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer" style="display: block;">
                            <div class="hstack gap-2 justify-content-end">
                                <a class="btn btn-primary" href="{{ route('dashboard.transaction.projects.edit', $project->id) }}"> Kembali</a>
                                <button type="submit" class="btn btn-success" id="add-btn">Konfirmasi Pembayaran</button>
                            </div>
                        </div>
                    </form>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div>
</div>
@endsection