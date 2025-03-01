@extends('layouts.dashboard')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" disabled required="" value="{{ $service_type->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan Harga" disabled required="" value="{{ $service_type->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control bg-transparent w-auto" name="status" id="status2" required disabled>
                            <option value="">-- Pilih --</option>
                            <option value="AKTIF" {{ $service_type->status == 'AKTIF' ? 'selected' : '' }}>Aktif</option>
                            <option value="TIDAK_AKTIF" {{ $service_type->status == 'TIDAK_AKTIF' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>

                    <div class="hstack gap-2 justify-content-end mb-3">
                        <a class="btn btn-primary" href="{{ route('dashboard.master-data.service-types.index') }}"> Kembali</a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </div>
</div>
@endsection