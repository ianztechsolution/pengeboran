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
                            @if(auth()->user()->hasRole('customer'))
                                <div class="col-sm-12 col-md-6 d-flex justify-content-start">
                                    <button type="button" class="btn btn-success add-btn ajax_modal_btn" title="Add" data-modal-title="Tambah Jenis Layanan"
                                        data-modal-size="lg" data-render-route="{{ route('dashboard.transaction.projects.create') }}" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i></button>
                                </div>
                            @endif
                        </div>
                        @include('page.dashboard.projects.render.create')
                        @include('page.dashboard.projects.table.id')
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
    let table = new DataTable('#payment-channels-datatables');
    }); 

</script>
@endsection