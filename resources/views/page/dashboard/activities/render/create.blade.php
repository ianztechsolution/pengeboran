<ul class="nav nav-tabs mb-4" id="languageTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="english-tab" data-bs-toggle="tab" data-bs-target="#english" type="button"
            role="tab" aria-controls="english" aria-selected="true">English (Default)</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="indonesian-tab" data-bs-toggle="tab" data-bs-target="#indonesian" type="button"
            role="tab" aria-controls="indonesian" aria-selected="false">Indonesian</button>
    </li>
</ul>
<form action="{{ route('dashboard.activities.store') }}" method="post" class="ajax_form" data-after-submit="reload"
    enctype="multipart/form-data">
    @csrf
    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="images_en[]" class="required">Images</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" class="form-control" name="images_en[]" accept="image/*" id="images" multiple>
                </div>
            </div>
        
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="title_en" class="required">Title</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Enter title">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="price_en" class="required">Price</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="price_en" id="price_en" placeholder="Enter Price">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="price_type_en" class="required">Price Types</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select name="price_type_en" id="price_type_en" class="form-control">
                        <option value="">-- Choose --</option>
                        <option value="person">Person</option>
                        <option value="group">Group</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="category_id" class="required">Category</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">-- Choose --</option>
                        @foreach ($categories as $category)
                            <option value="{{  $category->id }}">{{ $category->title_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="highlight_en" class="required">Highlight</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="highlight_en" id="highlight_en" placeholder="Enter highlight"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_en" class="required">Short Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="short_description_en" id="short_description_en"
                        placeholder="Enter short description">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_en" class="required">Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_en" id="description_en" placeholder="Enter description"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="location_en" class="required">Location</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="location_en" id="location_en"
                        placeholder="Enter Location">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="what_to_bring_en" class="required">What To Bring</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="what_to_bring_en" id="what_to_bring_en" placeholder="Enter text"></textarea>
                </div>
            </div>
     
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="pickup_time_en" class="required">Pickup Time</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="pickup_time_en" id="pickup_time_en" placeholder="Enter Pickup Time"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="package_detail_confirmation_en" class="required">Package Detail Confirmation</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="package_detail_confirmation_en" id="package_detail_confirmation_en" placeholder="Enter text"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="payment_cancelation_policy_en" class="required">Payment Cancelation Policy</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="payment_cancelation_policy_en" id="payment_cancelation_policy_en" placeholder="Enter text"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="minimum_slot" class="required">Minimum Slot</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="minimum_slot" id="minimum_slot" placeholder="Enter Minimum Slot">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="duration_hour" class="required">Duration Hour</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="duration_hour" id="duration_hour" placeholder="Enter Duration Hour">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="product_id">Product</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select name="product_id" id="product_id" class="form-control">
                        <option value="">-- Choose --</option>
                        @foreach ($products as $product)
                            <option value="{{  $product->id }}">{{ $product->name_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="gmap_link">Gmap Link</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="gmap_link" id="gmap_link" placeholder="Enter Gmap Link"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="start_time">Start Time</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="time" class="form-control" name="start_time" id="start_time" placeholder="Enter Start Time">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="note_en">Note</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="note_en" id="note_en" placeholder="Enter Note"></textarea>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="indonesian" role="tabpanel" aria-labelledby="indonesian-tab">
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="images_id[]">Gambar</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" class="form-control" name="images_id[]" accept="image/*" id="images" multiple placeholder="Pilih Gambar">
                </div>
            </div>
        
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="title_id">Judul</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="title_id" id="title_id" placeholder="Masukkan Judul">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="price_id">Harga</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="price_id" id="price_id" placeholder="Masukkan Harga">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="price_type_id">Jenis Harga</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select name="price_type_id" id="price_type_id" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="person">Perseorangan</option>
                        <option value="group">Grup</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="highlight_id">Sorotan</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="highlight_id" id="highlight_id" placeholder="Masukkan Sorotan"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_id">Deskripsi Singkat</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="short_description_id" id="short_description_id"
                        placeholder="Masukkan Deskripsi Singkat">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_id">Deskripsi</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_id" id="description_id" placeholder="Masukkan Deskripsi"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="location_id">Lokasi</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="location_id" id="location_id"
                        placeholder="Masukkan Lokasi">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="what_to_bring_id">Apa yang harus Dibawa?</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="what_to_bring_id" id="what_to_bring_id" placeholder="Masukkan isi"></textarea>
                </div>
            </div>
     
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="pickup_time_id">Waktu Penjemputan</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="pickup_time_id" id="pickup_time_id" placeholder="Masukkan isi"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="package_detail_confirmation_id">Konfirmasi Detail Paket</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="package_detail_confirmation_id" id="package_detail_confirmation_id" placeholder="Masukkan Isi"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="payment_cancelation_policy_id">Kebijakan Pembatalan Pembayaran</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="payment_cancelation_policy_id" id="payment_cancelation_policy_id" placeholder="Masukkan Isi"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="note_id">Catatan</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="note_id" id="note_id" placeholder="Masukkan Catatan"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>
