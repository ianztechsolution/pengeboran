@extends('layouts.dashboard')
@section('content')
<style>
    .image_delete_button {
    transition: 0.3s;
    position: relative;
    overflow: hidden;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: auto;
}

.image_delete_button img {
    object-fit: cover;
    width: 100%;
    height: 100%
}
.image_delete_button:hover::after {
    content: "Show";
    position: absolute;
    color: white;
    font-size: 14px;
    background: rgba(11, 179, 131, 1);
    padding: 5px 10px;
    border-radius: 5px;
}

</style>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label for="service_type-field" class="form-label">Jenis Layanan</label>
                <select class="form-control" data-trigger="" name="service_type_id" id="service_type-field" disabled>
                    <option value="">Pilih Jenis Layanan</option>
                    @foreach ($available_services as $available_service)
                    <option value="{{ $available_service->id }}" {{ $available_service->id === $projectService->service_type->id ? 'selected' : '' }}>{{ $available_service->name }} - Biaya : {{ \App\Helper\Helper::currencyFormatting($available_service->price, 'Rp. ') }}</option>
                    @endforeach
                </select>
            </div>

            @if(!auth()->user()->hasRole('admin'))
            <div class="mb-3">
                <label for="technician_name" class="form-label">Petugas</label>
                <input type="text" class="form-control" id="technician_name" name="technician_name" required="" disabled value="{{ $projectService->project->technician ? $projectService->project->technician->name : '-' }}">
            </div>
            @else
            <div class="mb-3">
                <label for="technician_id" class="form-label">Teknisi <span class="text-danger">*</span></label>
                <select class="form-control bg-transparent w-auto" name="technician_id" id="technician_id2" required>
                    <option value="">-- Pilih --</option>
                    @foreach ($technicians as $technician)
                    <option value="{{ $technician->id }}" {{ $projectService->project->technician_id == $technician->id ? 'selected' : '' }}>{{ $technician->name }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-control bg-transparent w-auto" name="status" id="status2" required {{ !auth()->user()->hasRole('admin') ? (auth()->user()->id == $projectService->project->technician_id &&  $projectService->status == "SCHEDULED") ? '' : 'disabled' : '' }}>
                    <option value="">-- Pilih --</option>
                    @if(auth()->user()->hasRole('customer'))
                    <option value="REQUEST_APPROVAL" {{ $projectService->status == 'REQUEST_APPROVAL' ? 'selected' : '' }}>Persetujuan Layanan</option>
                    <option value="SCHEDULED" {{ $projectService->status == 'SCHEDULED' ? 'selected' : '' }}>Penjadwalan</option>
                    <option value="DONE" {{ $projectService->status == 'DONE' ? 'selected' : '' }}>Selesai</option>
                    <option value="CANCELED" {{ $projectService->status == 'CANCELED' ? 'selected' : '' }}>Dibatalkan</option>
                    @endif
                    @if(auth()->user()->hasRole('admin'))
                    <option value="REQUEST_APPROVAL" {{ $projectService->status == 'REQUEST_APPROVAL' ? 'selected' : '' }}>Persetujuan Layanan</option>
                    <option value="SCHEDULED" {{ $projectService->status == 'SCHEDULED' ? 'selected' : '' }}>Penjadwalan</option>
                    <option value="DONE" {{ $projectService->status == 'DONE' ? 'selected' : '' }}>Selesai</option>
                    <option value="CANCELED" {{ $projectService->status == 'CANCELED' ? 'selected' : '' }}>Dibatalkan</option>
                    @endif
                    @if(auth()->user()->id == $projectService->project->technician_id && ($projectService->status == "SCHEDULED" || $projectService->status == "DONE"))
                        <option value="SCHEDULED" {{ $projectService->status == 'SCHEDULED' ? 'selected' : '' }}>Penjadwalan</option>
                        <option value="DONE" {{ $projectService->status == 'DONE' ? 'selected' : '' }}>Selesai</option>
                        <option value="CANCELED" {{ $projectService->status == 'CANCELED' ? 'selected' : '' }}>Dibatalkan</option>

                    @endif
                </select>
            </div>

            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('technician') && auth()->user()->id == $projectService->technician_id)
                <div class="row mb-3">
                    <div class="col-12 col-lg-8">
                        <label for="images" class="required">File Laporan</label>
                        <input type="file" class="form-control" name="images[]" accept=".jpeg,.jpg,.png,.webp,.gif" id="image" multiple disabled>
                        @if ($projectService->medias)
                            <div class="row row-cols-3 row-cols-lg-4">
                                @foreach ($projectService->medias as $image)
                                    @if ($image->path)
                                        <div class="col mt-3">
                                            <a href="{{ $image->path }}" target="_blank" class="image_delete_button"
                                                data-route="{{ route('image.destroy-by-path', ['image' => $image->id]) }}">
                                                <img src="{{ $image->path }}" alt="Image">
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endif
            <div class="mb-3">
                <label for="description-field" class="form-label">Deskripsi</label>
                <textarea name="description" id="description-field" class="form-control" disabled placeholder="Masukkan Deskripsi">{!! $projectService->description !!}</textarea>
            </div>

            <div class="hstack justify-content-end mb-3 mt-3">
                <a class="btn btn-primary" href="{{ route('dashboard.transaction.projects.edit', $projectService->project->id) }}"> Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection