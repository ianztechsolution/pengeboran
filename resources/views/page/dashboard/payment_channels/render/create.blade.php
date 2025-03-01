<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Metode Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" action="{{ route('dashboard.master-data.payment-channels.store') }}" method="post" class="ajax_form" data-after-submit="reload"
            enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="name-field" class="form-label">Nama</label>
                        <input type="text" name="name" id="name-field" class="form-control" placeholder="Masukkan Nama" required="">
                    </div>

                    <div class="mb-3">
                        <label for="description-field" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description-field" class="form-control" placeholder="Masukkan Deskripsi"></textarea>
                    </div>
                    <div>
                        <label for="status-field" class="form-label">Status</label>
                        <select class="form-control" data-trigger="" name="status" id="status-field">
                            <option value="">Status</option>
                            <option value="AKTIF">Aktif</option>
                            <option value="TIDAK_AKTIF">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer" style="display: block;">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Tambah Metode Pembayaran</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>