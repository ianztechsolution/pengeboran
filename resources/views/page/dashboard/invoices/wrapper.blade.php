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
                                <a class="btn btn-success" href="{{ route('dashboard.transaction.invoices.create') }}"><i class="ri-add-line align-bottom me-1"></i></a>
                            </div>
                        </div>
                        @include('page.dashboard.invoices.table.id')
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