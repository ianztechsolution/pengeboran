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
                        <p class="text-muted">Periode :</p>
                        <form method="GET" action="">
                            @csrf
                            <div class="row row-cols-lg-auto g-3 align-items-center">
                                <div class="col-12">
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date" value="{{ request('start_date') }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date" value="{{ request('end_date') }}">
                                    </div>
                                </div>

                                <!--end col-->
                                <div class="col-12">
                                    <a href="{{ route('dashboard.reports.index') }}" class="btn btn-outer-primary mb-2">Clear</a>
                                    <button type="submit" class="btn btn-primary mb-2">Filter</button>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                        @if(request()->get('start_date') && request()->get('end_date'))
                            @include('page.dashboard.reports.table.id')
                        @endif
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