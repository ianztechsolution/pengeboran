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
                                <button type="button" class="btn btn-success add-btn"
                                    data-modal-size="lg" data-render-route="{{ route('dashboard.transaction.users.create') }}?role={{ $role }}" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i></button>
                            </div>
                        </div>
                        @include('page.dashboard.userManagement.render.create')
                        @include('page.dashboard.userManagement.table.id')
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