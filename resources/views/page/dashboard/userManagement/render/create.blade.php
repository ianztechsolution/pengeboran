<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" action="{{ route('dashboard.transaction.users.store') }}" method="post" class="ajax_form" data-after-submit="reload"
            enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="role" class="form-control" value="{{ strtolower($role) }}" required="">

                    <div class="mb-3">
                        <label for="name-field" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name-field" class="form-control" placeholder="Masukkan Nama" required="">
                    </div>

                    <div class="mb-3">
                        <label for="email-field" class="form-label">E-mail <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email-field" class="form-control" placeholder="Masukkan Email" required="">
                    </div>

                    <div class="mb-3">
                        <label for="phone-field" class="form-label">Phone</label>
                        <input type="number" name="phone" id="phone-field" class="form-control" placeholder="Masukkan Telepon">
                    </div>

                    <div class="mb-3">
                        <label for="address-field" class="form-label">Alamat</label>
                        <textarea name="address" id="address-field" class="form-control" placeholder="Masukkan Alamat"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="password-field" class="form-label">Kata Sandi <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password-field" class="form-control" placeholder="Masukkan Kata Sandi" required="">
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