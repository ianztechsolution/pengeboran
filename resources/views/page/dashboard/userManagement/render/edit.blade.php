@extends('layouts.dashboard')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
       
            <div class="row">
                <div class="col-xxl-12">
                    <form action="{{ route('dashboard.transaction.users.update', $user->id) }}" method="post" 
                enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name-field" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name-field" class="form-control" placeholder="Masukkan Nama" required="" value="{{ $user->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="email-field" class="form-label">E-mail <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email-field" class="form-control" placeholder="Masukkan Email" disabled required="" value="{{ $user->email }}">
                        </div>

                        <div class="mb-3">
                            <label for="phone-field" class="form-label">Phone</label>
                            <input type="number" name="phone" id="phone-field" class="form-control" placeholder="Masukkan Telepon" value="{{ $user->phone }}">
                        </div>

                        <div class="mb-3">
                            <label for="address-field" class="form-label">Alamat</label>
                            <textarea name="address" id="address-field" class="form-control" placeholder="Masukkan Alamat">{!! $user->address !!}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Role <span class="text-danger">*</span></label>
                            <select class="form-control bg-transparent w-auto" name="role" id="role2" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ strtolower($role->name) }}" {{ strtolower(request()->get('role')) === $role->name ? 'selected': '' }}>{{ ucwords($role->name) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="new_password-field" class="form-label">Password</label>
                            <input type="password" name="password" id="new_password-field" class="form-control" placeholder="Masukkan Password">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Ubah</button>
                        </div>
                    </form>
                </div><!--end col-->
            </div><!--end row-->

            <div class="hstack gap-2 justify-content-end mb-3 mt-3">
                <a class="btn btn-primary" href="{{ route('dashboard.transaction.users.index') }}?role={{ request()->get('role') }}"> Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection