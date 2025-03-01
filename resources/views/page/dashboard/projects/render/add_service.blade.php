<div class="modal fade" id="showServiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" action="{{ route('dashboard.transaction.service-types.store') }}" method="post" class="ajax_form" data-after-submit="reload"
            enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="project_id" class="form-control" value="{{ $project->id }}" required="">
                    <input type="hidden" name="status" class="form-control" value="REQUEST_APPROVAL" required="">

                    <div class="mb-3">
                        <label for="service_type-field" class="form-label">Jenis Layanan</label>
                        <select class="form-control" data-trigger="" name="service_type_id" id="service_type-field">
                            <option value="">Pilih Jenis Layanan</option>
                            @foreach ($available_services as $available_service)
                                <option value="{{ $available_service->id }}">{{ $available_service->name }} - Biaya : {{ \App\Helper\Helper::currencyFormatting($available_service->price, 'Rp. ') }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="description-field" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description-field" class="form-control" placeholder="Masukkan Deskripsi"></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="display: block;">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>