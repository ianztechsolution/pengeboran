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
<form action="{{ route('dashboard.products.update', $product->id) }}" method="post" class="ajax_form" data-after-submit="reload"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="image_en">Images</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" class="form-control" name="image_en[]" accept="image/*" id="image_en" multiple>
                    @if ($product->images)
                        <div class="row row-cols-3 row-cols-lg-4">
                            @foreach ($product->images as $image)
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
                    <label for="code" class="required">Code</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="code" id="code" value="{{ $product->code }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="name_en" class="required">Name</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name" value="{{ $product->name_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_en">Short Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="short_description_en" id="short_description_en" placeholder="Enter Text">{{ $product->short_description_en }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_en">Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_en" id="description_en" placeholder="Enter Text">{{ $product->description_en }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="availability" class="required">Availability</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="availability" id="availability">
                        <option value="available">Available</option>
                        <option value="inavailable">inavailable</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="indonesian" role="tabpanel" aria-labelledby="indonesian-tab">
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="image_id">Gambar</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" class="form-control" name="image_id[]" accept="image/*" id="image_id" multiple>
                    @if ($product->images)
                        <div class="row row-cols-3 row-cols-lg-4">
                            @foreach ($product->images as $image)
                                @if ($image->path_id)
                                    <div class="col mt-3">
                                        <div class="image_delete_button"
                                            data-route="{{ route('image.destroy-by-path', ['image' => $image->id, 'lang' => 'id']) }}">
                                            <img src="{{ $image->path_id }}" alt="Gambar">
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
                    <label for="name_id">Nama Produk</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="name_id" id="name_id" placeholder="Masukkan Nama Produk" value="{{ $product->name_id }}">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_id">Deskripsi Singkat</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="short_description_id" id="short_description_id" placeholder="Enter Text">{{ $product->short_description_id }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_id">Deskripsi</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_id" id="description_id" placeholder="Enter Text">{{ $product->description_id }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>
