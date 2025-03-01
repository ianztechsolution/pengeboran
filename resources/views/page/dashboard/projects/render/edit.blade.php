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
                            <form action="{{ route('dashboard.transaction.projects.update', $project->id) }}" method="post" 
                        enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="customer_id" class="form-label">Pelanggan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="customer_id" name="customer_id" placeholder="Masukkan Nama" disabled required="" value="{{ $project->customer->name }}">
                                </div>

                                @if(!auth()->user()->hasRole('admin'))
                                    <div class="mb-3">
                                        <label for="technician_name" class="form-label">Petugas</label>
                                        <input type="text" class="form-control" id="technician_name" name="technician_name" required="" disabled value="{{ $project->technician ? $project->technician->name : '-' }}">
                                    </div>
                                @else
                                    <div class="mb-3">
                                        <label for="technician_id" class="form-label">Teknisi <span class="text-danger">*</span></label>
                                        <select class="form-control bg-transparent w-auto" name="technician_id" id="technician_id2" required>
                                            <option value="">-- Pilih --</option>
                                            @foreach ($technicians as $technician)
                                                <option value="{{ $technician->id }}" {{ $project->technician_id == $technician->id ? 'selected' : '' }}>{{ $technician->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

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
                                    <select class="form-control bg-transparent w-auto" name="status" id="status2" required {{ !auth()->user()->hasRole('admin') ? (auth()->user()->id == $project->technician_id &&  $project->status == "SCHEDULED") ? '' : 'disabled' : '' }}>
                                        <option value="">-- Pilih --</option>
                                        @if(auth()->user()->hasRole('customer'))
                                            <option value="REQUEST_APPROVAL" {{ $project->status == 'REQUEST_APPROVAL' ? 'selected' : '' }}>Persetujuan Layanan</option>
                                            <option value="WAITING_PAYMENT" {{ $project->status == 'WAITING_PAYMENT' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                                            <option value="SCHEDULED" {{ $project->status == 'SCHEDULED' ? 'selected' : '' }}>Penjadwalan</option>
                                            <option value="DONE" {{ $project->status == 'DONE' ? 'selected' : '' }}>Selesai</option>
                                            <option value="CANCELED" {{ $project->status == 'CANCELED' ? 'selected' : '' }}>Dibatalkan</option>
                                        @endif
                                        @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('technician'))
                                            <option value="REQUEST_APPROVAL" {{ $project->status == 'REQUEST_APPROVAL' ? 'selected' : '' }}>Persetujuan Layanan</option>
                                            <option value="WAITING_PAYMENT" {{ $project->status == 'WAITING_PAYMENT' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                                            <option value="SCHEDULED" {{ $project->status == 'SCHEDULED' ? 'selected' : '' }}>Penjadwalan</option>
                                            <option value="DONE" {{ $project->status == 'DONE' ? 'selected' : '' }}>Selesai</option>
                                            <option value="CANCELED" {{ $project->status == 'CANCELED' ? 'selected' : '' }}>Dibatalkan</option>
                                        @endif
                                        @if(auth()->user()->id == $project->technician_id &&  $project->status == "SCHEDULED")
                                            <option value="SCHEDULED" {{ $project->status == 'SCHEDULED' ? 'selected' : '' }}>Penjadwalan</option>
                                            <option value="DONE" {{ $project->status == 'DONE' ? 'selected' : '' }}>Selesai</option>
                                            <option value="CANCELED" {{ $project->status == 'CANCELED' ? 'selected' : '' }}>Dibatalkan</option>

                                        @endif
                                    </select>
                                </div>

                                @if(auth()->user()->hasRole('admin'))
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                    </div>
                                @elseif(auth()->user()->id == $project->customer_id &&  $project->status == "REQUEST_APPROVAL")
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                    </div>
                                @elseif(auth()->user()->id == $project->technician_id &&  $project->status == "SCHEDULED")
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                    </div>
                                @endif
                            </form>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
                <div class="tab-pane" id="base-justified-services" role="tabpanel">
                    <h6>Informasi Layanan</h6>
                    @if((auth()->user()->hasRole('customer') || $project->customer_id == auth()->user()->id) && $project->status == "REQUEST_APPROVAL")
                        <div class="col-sm-12 col-md-6 d-flex justify-content-start mb-2">
                            <button type="button" class="btn btn-success add-btn ajax_modal_btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showServiceModal"><i class="ri-add-line align-bottom me-1"></i></button>
                        </div>

                        @include('page.dashboard.projects.render.add_service')
                    @endif
                    <table id="services-datatables" class="display table dt-responsive table-borderless table-centered align-middle table-nowrap mb-0">
                        <thead class="bg-light bg-opacity-50">
                            <tr>
                                <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="id">#</th>
                                <th style="width: 100px" scope="col" class="sort cursor-pointer text-muted" data-sort="customer">Nama Layanan</th>
                                <th style="width: 150px" scope="col" class="sort cursor-pointer text-muted" data-sort="title">Petugas</th>
                                <th style="width: 150px" scope="col" class="sort cursor-pointer text-muted" data-sort="price">Harga</th>
                                <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="status">Status</th>
                                <th style="width: 30px" scope="col" class="text-muted">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($project->services as $service)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td class="service_name">
                                    {{ $service->service_type->name }}
                                </td>
                                <td class="title">
                                    {{ $service->technician ? $service->technician->name : '-' }}
                                </td>
                                <td class="price">
                                    {{ \App\Helper\Helper::currencyFormatting($service->service_type->price, 'Rp. ') }}
                                </td>
                                <td class="status">
                                    <span class="badge bg-{{ $service->status === 'DONE' ? 'success' : 'danger' }}">
                                        {{ str_replace('_', ' ', ucwords($service->status)) }}
                                    </span>
                                </td>
                                <td class="d-flex align-items-center gap-3 justify-content-end">
                                    @if(auth()->user()->hasRole('admin') || (auth()->user()->hasRole('technician') && auth()->user()->id == $project->technician_id && $service->status == 'DONE'))
                                        <a href="{{ route('dashboard.transaction.service-types.show', $service->id) }}" class="btn btn-sm btn-info">
                                            <i class="bx bx-show"></i>
                                        </a>
                                    @endif
                                    @if(auth()->user()->hasRole('admin') || (auth()->user()->hasRole('technician') && auth()->user()->id == $project->technician_id && $service->status != 'DONE'))
                                        <a href="{{ route('dashboard.transaction.service-types.edit', $service->id) }}" class="btn btn-sm btn-warning">
                                            <i class="ri-edit-2-line"></i>
                                        </a>
                                    @endif
              
                                    @if($project->status == "REQUEST_APPROVAL"  || ($project->customer_id == auth()->user()->id || auth()->user()->hasRole('admin')))
                                        <form action="{{ route('dashboard.transaction.service-types.destroy', $service->id) }}" method="POST" style="display:inline;" data-after-submit="reload">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="ri-delete-bin-line"></i></button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div>
                @if(auth()->user()->hasRole('admin') || (auth()->user()->hasRole('customer') && auth()->user()->id === $project->customer_id))

                    <div class="tab-pane" id="base-justified-invoices" role="tabpanel">
                        <h6>Tagihan</h6>
                        @if(auth()->user()->hasRole('admin') && $project->status == "WAITING_PAYMENT")
                            <div class="col-sm-12 col-md-6 d-flex justify-content-start mb-2">
                                <a class="btn btn-success" href="{{ route('dashboard.transaction.invoices.create') }}?project_id={{ $project->id }}"><i class="ri-add-line align-bottom me-1"></i></A>
                            </div>
                        @endif

                        <table id="invoices-datatables" class="display table dt-responsive table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="bg-light bg-opacity-50">
                                <tr>
                                    <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="id">#</th>
                                    <th style="width: 100px" scope="col" class="sort cursor-pointer text-muted" data-sort="customer">No Tagihan</th>
                                    <th style="width: 150px" scope="col" class="sort cursor-pointer text-muted" data-sort="title">Total Tagihan</th>
                                    <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="status">Status</th>
                                    <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="date">Deskripsi</th>
                                    <th style="width: 30px" scope="col" class="text-muted">Aksi</th>
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
                                    <td class="d-flex align-items-center gap-3 justify-content-end">
                                        <a href="{{ route('dashboard.transaction.invoices.show', $invoice->id) }}" class="btn btn-sm btn-info">
                                            <i class="bx bx-show"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                    <div class="tab-pane" id="base-justified-payments" role="tabpanel">
                        <h6>Pembayaran</h6>
                        @if(auth()->user()->hasRole('customer') && $project->status == "WAITING_PAYMENT")
                            <div class="col-sm-12 col-md-6 d-flex justify-content-start mb-2">
                                <a class="btn btn-success" href="{{ route('dashboard.transaction.payments.create') }}?project_id={{ $project->id }}"><i class="ri-add-line align-bottom me-1"></i></A>
                            </div>
                        @endif

                        <table id="payments-datatables" class="display table dt-responsive table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="bg-light bg-opacity-50">
                                <tr>
                                    <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="id">#</th>
                                    <th style="width: 100px" scope="col" class="sort cursor-pointer text-muted" data-sort="customer">No Tagihan</th>
                                    <th style="width: 150px" scope="col" class="sort cursor-pointer text-muted" data-sort="title">Total Tagihan</th>
                                    <th style="width: 150px" scope="col" class="sort cursor-pointer text-muted" data-sort="title">Total Pembayaran</th>
                                    <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="status">Status</th>
                                    <th style="width: 30px" scope="col" class="text-muted">Aksi</th>
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
                                        <span class="badge bg-{{ $payment->status === 'PAID' ? 'success' : 'danger' }}">
                                            {{ str_replace('_', ' ', ucwords($payment->status)) }}
                                        </span>
                                    </td>
                                    <td class="d-flex align-items-center gap-3 justify-content-end">
                                        <a href="{{ route('dashboard.transaction.payments.show', $payment->id) }}" class="btn btn-sm btn-info">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        @if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('customer') && $payment->status != 'PAID'))
                                            <a href="{{ route('dashboard.transaction.payments.edit', $payment->id) }}" class="btn btn-sm btn-warning">
                                                <i class="ri-edit-2-line"></i>
                                            </a>
                                        @endif
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