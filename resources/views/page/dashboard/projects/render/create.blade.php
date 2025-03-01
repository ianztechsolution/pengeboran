<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Minta Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
            </div>
            <form class="tablelist-form" action="{{ route('dashboard.transaction.projects.store') }}" method="post" class="ajax_form" data-after-submit="reload"
            enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="customer_id" class="form-control" value="{{ auth()->user()->id }}" required="">
                    <input type="hidden" name="status" class="form-control" value="REQUEST_APPROVAL" required="">

                    <div class="mb-3">
                        <label for="title-field" class="form-label">Judul</label>
                        <input type="text" name="title" id="title-field" class="form-control" placeholder="Masukkan Judul" required="">
                    </div>

                    <div class="mb-3">
                        <label for="date-field" class="form-label">Tanggal</label>
                        <input type="date" name="date" id="date-field" class="form-control" placeholder="Masukkan Tanggal" required="">
                    </div>

                    <div class="mb-3">
                        <label for="address-field" class="form-label">Alamat</label>
                        <textarea name="address" id="address-field" class="form-control" placeholder="Masukkan Alamat"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="description-field" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description-field" class="form-control" placeholder="Masukkan Deskripsi"></textarea>
                    </div>

                    <div>
                        <label for="payment-channel-field" class="form-label">Metode Pembayaran</label>
                        <select class="form-control" data-trigger="" name="payment_channel_id" id="payment-channel-field">
                            <option value="">Pilih Metode Pembayaran</option>
                            @foreach ($payment_channels as $payment_channel)
                                <option value="{{ $payment_channel->id }}">{{ $payment_channel->name }}</option>
                                
                            @endforeach
                        </select>
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