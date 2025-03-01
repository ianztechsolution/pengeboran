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
<form action="{{ route('dashboard.activities.update', $activity->id) }}" method="post" class="ajax_form" data-after-submit="reload"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
        <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="image_en" class="required">Images</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" class="form-control" name="images_en[]" accept="image/*" id="image_en" multiple>
                    @if ($activity->images)
                        <div class="row row-cols-3 row-cols-lg-4">
                            @foreach ($activity->images as $image)
                                @if ($image->path_en)
                                    <div class="col mt-3">
                                        <div class="image_delete_button"
                                            data-route="{{ route('image.destroy-by-path', ['image' => $image->id, 'lang' => 'en']) }}">
                                            <img src="{{ $image->path_en }}" alt="Image">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="title_en" class="required">Title</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Enter title" value="{{ $activity->title_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="price_en" class="required">Price</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="price_en" id="price_en" placeholder="Enter Price"  value="{{ $activity->price_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="price_type_en" class="required">Price Types</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select name="price_type_en" id="price_type_en" class="form-control">
                        <option value="">-- Choose --</option>
                        <option value="person" {{ ($activity->price_type_en && $activity->price_type_en === 'person') ? 'selected': '' }}>Person</option>
                        <option value="group" {{ ($activity->price_type_en && $activity->price_type_en === 'group') ? 'selected': '' }}>Group</option>
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
                            <option value="{{  $category->id }}" {{ ($selected_category->id === $category->id) ? 'selected': '' }}>{{ $category->title_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="highlight_en" class="required">Highlight</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="highlight_en" id="highlight_en" placeholder="Enter highlight">{{ $activity->highlight_en }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_en" class="required">Short Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="short_description_en" id="short_description_en"  value="{{ $activity->short_description_en }}"
                        placeholder="Enter short description">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_en" class="required">Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_en" id="description_en" placeholder="Enter description">{{ $activity->description_en }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="location_en" class="required">Location</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="location_en" id="location_en"  value="{{ $activity->location_en }}"
                        placeholder="Enter Location">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="what_to_bring_en" class="required">What To Bring</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="what_to_bring_en" id="what_to_bring_en" placeholder="Enter text">{{ $activity->what_to_bring_en }}</textarea>
                </div>
            </div>
     
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="pickup_time_en" class="required">Pickup Time</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="pickup_time_en" id="pickup_time_en" placeholder="Enter Pickup Time">{{ $activity->pickup_time_en }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="package_detail_confirmation_en" class="required">Package Detail Confirmation</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="package_detail_confirmation_en" id="package_detail_confirmation_en" placeholder="Enter text">{{ $activity->package_detail_confirmation_en }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="payment_cancelation_policy_en" class="required">Payment Cancelation Policy</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="payment_cancelation_policy_en" id="payment_cancelation_policy_en" placeholder="Enter text">{{ $activity->payment_cancelation_policy_en }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="minimum_slot" class="required">Minimum Slot</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="minimum_slot" id="minimum_slot" placeholder="Enter Minimum Slot"  value="{{ $activity->minimum_slot }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="duration_hour" class="required">Duration Hour</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="duration_hour" id="duration_hour" placeholder="Enter Duration Hour"  value="{{ $activity->duration_hour }}">
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
                            <option value="{{  $product->id }}" {{  $activity->product_id === $product->id ? 'selected' : '' }}>{{ $product->name_en }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="gmap_link">Gmap Link</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="gmap_link" id="gmap_link" placeholder="Enter Gmap Link">{{ $activity->gmap_link }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="start_time">Start Time</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="start_time" id="start_time" placeholder="Enter Start Time"  value="{{ $activity->start_time }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="note_en">Note</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="note_en" id="note_en" placeholder="Enter Note">{{ $activity->note_en }}</textarea>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="indonesian" role="tabpanel" aria-labelledby="indonesian-tab">
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="image_en">Gambar</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" class="form-control" name="images_id[]" accept="image/*" id="image_id" multiple>
                    @if ($activity->images)
                        <div class="row row-cols-3 row-cols-lg-4">
                            @foreach ($activity->images as $image)
                                @if ($image->path_id)
                                    <div class="col mt-3">
                                        <div class="image_delete_button"
                                            data-route="{{ route('image.destroy-by-path', ['image' => $image->id, 'lang' => 'id']) }}">
                                            <img src="{{ $image->path_id }}" alt="Image">
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="title_id">Judul</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="title_id" id="title_id" placeholder="Masukkan Judul"  value="{{ $activity->title_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="price_id">Harga</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="price_id" id="price_id" placeholder="Masukkan Harga"  value="{{ $activity->price_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="price_type_id">Jenis Harga</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select name="price_type_id" id="price_type_id" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="person" {{ ($activity->price_type_id && $activity->price_type_id === 'person') ? 'selected': '' }}>Perseorangan</option>
                        <option value="group" {{ ($activity->price_type_id && $activity->price_type_id === 'group') ? 'selected': '' }}>Grup</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="highlight_id">Sorotan</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="highlight_id" id="highlight_id" placeholder="Masukkan Sorotan">{{ $activity->highlight_id }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_id">Deskripsi Singkat</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="short_description_id" id="short_description_id"  value="{{ $activity->short_description_id }}"
                        placeholder="Masukkan Deskripsi Singkat">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_id">Deskripsi</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_id" id="description_id" placeholder="Masukkan Deskripsi">{{ $activity->description_id }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="location_id">Lokasi</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="location_id" id="location_id"  value="{{ $activity->location_id }}"
                        placeholder="Masukkan Lokasi">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="what_to_bring_id">Apa yang harus Dibawa?</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="what_to_bring_id" id="what_to_bring_id" placeholder="Masukkan isi">{{ $activity->what_to_bring_id }}</textarea>
                </div>
            </div>
     
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="pickup_time_id">Waktu Penjemputan</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="pickup_time_id" id="pickup_time_id" placeholder="Masukkan isi">{{ $activity->pickup_time_id }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="package_detail_confirmation_id">Konfirmasi Detail Paket</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="package_detail_confirmation_id" id="package_detail_confirmation_id" placeholder="Masukkan Isi">{{ $activity->package_detail_confirmation_id }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="payment_cancelation_policy_id">Kebijakan Pembatalan Pembayaran</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="payment_cancelation_policy_id" id="payment_cancelation_policy_id" placeholder="Masukkan Isi">{{ $activity->payment_cancelation_policy_id }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="note_id">Catatan</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="note_id" id="note_id" placeholder="Masukkan Catatan">{{ $activity->note_id }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>
