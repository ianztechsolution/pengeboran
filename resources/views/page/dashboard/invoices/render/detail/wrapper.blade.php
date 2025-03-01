@extends('layouts.dashboard')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xxl-12">
                <div class="mb-3">
                            <label for="project_id" class="form-label">Proyek <span class="text-danger">*</span></label>
                            <select class="form-control bg-transparent" name="project_id" id="project_id" disabled required>
                                <option value="">-- Pilih --</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" {{ $invoice->project_id == $project->id ? 'selected' : '' }}>{{ $project->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="customer_id" class="form-label">Pelanggan <span class="text-danger">*</span></label>
                            <input type="hidden" class="form-control" id="customer_id" name="customer_id" placeholder="Masukkan Pelanggan" disabled required="" value="{{ $invoice->customer_id }}">
                            <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Masukkan Nama Pelanggan" disabled required="" value="{{ $invoice->customer->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="invoice_no" class="form-label">Nomor Tagihan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="invoice_no" name="invoice_no" placeholder="Masukkan Nomor Tagihan" disabled required="" value="{{ $invoice->invoice_no }}">
                        </div>

                        <div class="mb-3">
                            <label for="total_price" class="form-label">Total Harga <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="total_price" name="total_price" placeholder="Masukkan Total Harga" disabled required="" value="{{ $invoice->total_price }}">
                        </div>

                        <div class="mb-3">
                            <label for="dicount" class="form-label">Discount</label>
                            <input type="number" class="form-control" id="dicount" name="dicount" placeholder="Masukkan Diskon" disabled value="{{ $invoice->dicount ? $invoice->dicount : 0 }}">
                        </div>

                        <div class="mb-3">
                            <label for="tax" class="form-label">Pajak</label>
                            <input type="number" class="form-control" id="tax" name="tax" placeholder="Masukkan Pajak" disabled value="{{ $invoice->tax ? $invoice->tax : 0 }}">
                        </div>

                        <div class="mb-3">
                            <label for="grand_total" class="form-label">Total Tagihan <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="grand_total" name="grand_total" placeholder="Masukkan Total Tagihan" disabled required="" value="{{ $invoice->grand_total }}">
                        </div>

                        <div class="mb-3">
                            <label for="total_payment" class="form-label">Total Dibayar</label>
                            <input type="number" class="form-control" id="total_payment" name="total_payment" placeholder="Masukkan Total Pembayaran" disabled value="{{ $invoice->total_payment }}">
                        </div>

                        <div class="mb-3">
                            <label for="paid_date" class="form-label">Tanggal Dibayar</label>
                            <input type="date" class="form-control" id="paid_date" name="paid_date" placeholder="Masukkan Tanggal Dibayar" disabled value="{{ $invoice->paid_date }}">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control bg-transparent w-auto" name="status" id="status2" required disabled>
                                <option value="">-- Pilih --</option>
                                <option value="WAITING_PAYMENT" {{ $invoice->status == 'WAITING_PAYMENT' ? 'selected' : '' }}>Belum dibayar</option>
                                <option value="PAID" {{ $invoice->status == 'PAID' ? 'selected' : '' }}>Sudah Bayar</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" disabled placeholder="Masukkan Deskripsi">{!! $invoice->description !!}</textarea>
                        </div>

                        <div class="hstack gap-2 justify-content-end mb-3">
                            <a class="btn btn-primary" href="{{ route('dashboard.transaction.invoices.index') }}"> Kembali</a>
                        </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div>
</div>
@endsection