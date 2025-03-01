@extends('layouts.dashboard')
@section('content')
    <div class="col-xxl-12">
        <div class="row">
            <div class="col-xxl-12">
                <div class="card" id="patientsList">
                    <div class="card-header">
                        <h4 class="card-title mb-0">{{ $title }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2 d-flex justify-content-between align-items-center">
                            <div class="col-sm-12 col-md-6 d-flex justify-content-start">
                                <button type="button" class="btn btn-success add-btn ajax_modal_btn" title="Add" data-modal-title="Tambah Jenis Layanan"
                                    data-modal-size="lg" data-render-route="{{ route('dashboard.master-data.service-types.create') }}" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i></button>
                            </div>
                            <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                                <form class="ms-2" action="" method="get">
                                    <div class="input-group">
                                        <label class="form-label gap-2"></label>
                                        <select class="form-control bg-transparent w-auto" name="status" id="status2" onchange="this.form.submit()">
                                            <option value="">-- Pilih --</option>
                                            <option value="AKTIF" {{ request('status') == 'AKTIF' ? 'selected' : '' }}>Aktif</option>
                                            <option value="TIDAK_AKTIF" {{ request('status') == 'TIDAK_AKTIF' ? 'selected' : '' }}>Tidak Aktif</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @include('page.dashboard.payments.render.create')
                        @include('page.dashboard.payments.table.id')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script type="text/javascript">

    //buttons exmples
    document.addEventListener('DOMContentLoaded', function () {
    let table = new DataTable('#service-types-datatables');
    }); 

</script>
@endsection