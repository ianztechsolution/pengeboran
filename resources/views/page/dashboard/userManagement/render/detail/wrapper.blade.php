@extends('layouts.dashboard')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="col-xxl-12">
                <div class="mb-3">
                    <label for="name-field" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name-field" class="form-control" placeholder="Masukkan Nama" disabled required="" value="{{ $user->name }}">
                </div>

                <div class="mb-3">
                    <label for="email-field" class="form-label">E-mail <span class="text-danger">*</span></label>
                    <input type="email" name="email" id="email-field" class="form-control" placeholder="Masukkan Email" disabled required="" value="{{ $user->email }}">
                </div>

                <div class="mb-3">
                    <label for="phone-field" class="form-label">Phone</label>
                    <input type="number" name="phone" id="phone-field" class="form-control" placeholder="Masukkan Telepon" disabled value="{{ $user->phone }}">
                </div>

                <div class="mb-3">
                    <label for="address-field" class="form-label">Alamat</label>
                    <textarea name="address" id="address-field" class="form-control" placeholder="Masukkan Alamat" disabled>{{  $user->address }}</textarea>
                </div>

                <div class="hstack gap-2 justify-content-end mb-3 mt-3">
                    <a class="btn btn-primary" href="{{ route('dashboard.transaction.users.index') }}?role={{ request()->get('role') }}"> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection