@extends('layouts.dashboard')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link fw-medium active" data-bs-toggle="tab" href="#base-justified-information" role="tab" aria-selected="true">
                        Informasi Proyek
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link fw-medium" data-bs-toggle="tab" href="#base-justified-services" role="tab" aria-selected="false" tabindex="-1">
                        Layanan
                    </a>
                </li>
                @if(auth()->user()->hasRole('admin') || (auth()->user()->hasRole('customer') && auth()->user()->id === $project->customer_id))
                    <li class="nav-item" role="presentation">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#base-justified-invoices" role="tab" aria-selected="false" tabindex="-1">
                            Tagihan
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link fw-medium" data-bs-toggle="tab" href="#base-justified-payments" role="tab" aria-selected="false" tabindex="-1">
                            Pembayaran
                        </a>
                    </li>
                @endif
            </ul>

            <div class="tab-content  text-muted">
                <div class="tab-pane active show" id="base-justified-information" role="tabpanel">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="mb-3">
                                <label for="customer_id" class="form-label">Pelanggan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="customer_id" name="customer_id" placeholder="Masukkan Nama" disabled required="" value="{{ $project->customer->name }}">
                            </div>

                            <div class="mb-3">
                                <label for="technician_name" class="form-label">Petugas</label>
                                <input type="text" class="form-control" id="technician_name" name="technician_name" disabled required="" value="{{ $project->technician ? $project->technician->name : '-' }}">
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul" disabled required="" value="{{ $project->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="date" name="date" placeholder="Masukkan Tanggal" disabled required="" value="{{ date('d/m/Y', strtotime($project->date)) }}">
                            </div>

                            <div class="mb-3">
                                <label for="payment_channel_name" class="form-label">Metode Pembayaran</label>
                                <input type="text" class="form-control" id="payment_channel_name" name="payment_channel_name" disabled required="" value="{{ $project->payment_channel->name }}">
                            </div>

                            <div class="mb-3">
                                <label for="address-field" class="form-label">Alamat</label>
                                <textarea name="address" id="address-field" class="form-control" placeholder="Masukkan Alamat" disabled>{!! $project->address !!}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="description-field" class="form-label">Deskripsi</label>
                                <textarea name="description" id="description-field" class="form-control" placeholder="Masukkan Deskripsi" disabled>{!! $project->description !!}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                <select class="form-control bg-transparent w-auto" name="status" id="status2" required disabled>
                                    <option value="">-- Pilih --</option>
                                    <option value="REQUEST_APPROVAL" {{ $project->status == 'REQUEST_APPROVAL' ? 'selected' : '' }}>Persetujuan Layanan</option>
                                    <option value="WAITING_PAYMENT" {{ $project->status == 'WAITING_PAYMENT' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                                    <option value="SCHEDULED" {{ $project->status == 'SCHEDULED' ? 'selected' : '' }}>Penjadwalan</option>
                                    <option value="DONE" {{ $project->status == 'DONE' ? 'selected' : '' }}>Selesai</option>
                                    <option value="CANCELED" {{ $project->status == 'CANCELED' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <div class="tab-pane" id="base-justified-services" role="tabpanel">
                    <h6>Informasi Layanan</h6>
                    <table id="services-datatables" class="display table dt-responsive table-borderless table-centered align-middle table-nowrap mb-0">
                        <thead class="bg-light bg-opacity-50">
                            <tr>
                                <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="id">#</th>
                                <th style="width: 100px" scope="col" class="sort cursor-pointer text-muted" data-sort="customer">Nama Layanan</th>
                                <th style="width: 150px" scope="col" class="sort cursor-pointer text-muted" data-sort="title">Petugas</th>
                                <th style="width: 150px" scope="col" class="sort cursor-pointer text-muted" data-sort="price">Harga</th>
                                <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="status">Status</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($services as $service)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td class="service_name">
                                    {{ $service->service_type->name }}
                                </td>
                                <td class="title">
                                    {{ $service->technician ? $project->technician->name : '-' }}
                                </td>
                                <td class="price">
                                    {{ \App\Helper\Helper::currencyFormatting($service->service_type->price, 'Rp. ') }}
                                </td>
                                <td class="status">
                                    <span class="badge bg-{{ $service->status === 'DONE' ? 'success' : 'danger' }}">
                                        {{ str_replace('_', ' ', ucwords($service->status)) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div>
                @if(auth()->user()->hasRole('admin') || (auth()->user()->hasRole('customer') && auth()->user()->id === $project->customer_id))

                    <div class="tab-pane" id="base-justified-invoices" role="tabpanel">
                        <h6>Tagihan</h6>
                        <table id="invoices-datatables" class="display table dt-responsive table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="bg-light bg-opacity-50">
                                <tr>
                                    <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="id">#</th>
                                    <th style="width: 100px" scope="col" class="sort cursor-pointer text-muted" data-sort="customer">No Tagihan</th>
                                    <th style="width: 150px" scope="col" class="sort cursor-pointer text-muted" data-sort="title">Total Tagihan</th>
                                    <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="status">Status</th>
                                    <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="date">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($project->invoices as $invoice)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="service_name">
                                        {{ $invoice->invoice_no }}
                                    </td>
                                    <td class="title">
                                        {{ \App\Helper\Helper::currencyFormatting($invoice->grand_total, 'Rp. ') }}
                                    </td>
                                    <td class="status">
                                        <span class="badge bg-{{ $invoice->status === 'PAID' ? 'success' : 'danger' }}">
                                            {{ str_replace('_', ' ', ucwords($invoice->status)) }}
                                        </span>
                                    </td>
                                    <td class="description">
                                        {!! $invoice->description !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                    <div class="tab-pane" id="base-justified-payments" role="tabpanel">
                        <h6>Pembayaran</h6>
                        <table id="payments-datatables" class="display table dt-responsive table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="bg-light bg-opacity-50">
                                <tr>
                                    <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="id">#</th>
                                    <th style="width: 100px" scope="col" class="sort cursor-pointer text-muted" data-sort="customer">No Tagihan</th>
                                    <th style="width: 150px" scope="col" class="sort cursor-pointer text-muted" data-sort="title">Total Tagihan</th>
                                    <th style="width: 150px" scope="col" class="sort cursor-pointer text-muted" data-sort="title">Total Pembayaran</th>
                                    <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="status">Status</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($project->payments as $payment)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="service_name">
                                        {{ $payment->invoice->invoice_no }}
                                    </td>
                                    <td class="title">
                                        {{ \App\Helper\Helper::currencyFormatting($payment->invoice->grand_total, 'Rp. ') }}
                                    </td>
                                    <td class="title">
                                        {{ \App\Helper\Helper::currencyFormatting($payment->total_payment, 'Rp. ') }}
                                    </td>
                                    <td class="status">
                                        <span class="badge bg-{{ $payment->status === 'AKTIF' ? 'success' : 'danger' }}">
                                            {{ str_replace('_', ' ', ucwords($project->status)) }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                @endif

                <div class="hstack gap-2 justify-content-end mb-3 mt-3">
                    <a class="btn btn-primary" href="{{ route('dashboard.transaction.projects.index') }}"> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection