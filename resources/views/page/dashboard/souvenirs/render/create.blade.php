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
<form action="{{ route('dashboard.souvenirs.store') }}" method="post" class="ajax_form" data-after-submit="reload"
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
                    <label for="availability" class="required">Status</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="availability" id="availability">
                        <option value="available">Available</option>
                        <option value="inavailable">Inavailable</option>
                    </select>
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
                    <input type="file" class="form-control" name="images_id[]" accept="image/*" id="images" multiple>
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
                    <label for="short_description_id">Deskripsi Singkat</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="short_description_id" id="short_description_id"
                        placeholder="Masukkan Teks">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_id">Deskripsi</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_id" id="description_id" placeholder="Masukkan Teks"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="note_id">Catatan</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="note_id" id="note_id" placeholder="Masukkan Teks"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>
