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
<form action="{{ route('dashboard.banners.update', $banners->id) }}" method="post" class="ajax_form"
    data-after-submit="reload" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="photo_en" class="required">Photo</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" accept="image/*" class="form-control" name="photo_en" id="photo_en">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="title_en" class="required">Title</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Enter title"
                        value="{{ $banners->title_en }}">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_en">Short Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="short_description_en" id="short_description_en"
                        placeholder="Enter short description" value="{{ $banners->short_description_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_en">Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_en" id="description_en" placeholder="Enter description">{{ old('description_en', $banners->description_en) }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="position">Position</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="position" id="position"
                        placeholder="Enter Position" value="{{ $banners->position }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="display">Display</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="display" id="display">
                        <option value="show" @selected(old('display', $banners->display) == 'show')>Show</option>
                        <option value="hide" @selected(old('display', $banners->display) == 'hide')>Hide</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="indonesian" role="tabpanel" aria-labelledby="indonesian-tab">
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="photo_id" class="required">Foto</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" accept="image/*" class="form-control" name="photo_id" id="photo_id"
                        >
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="title_id" class="required">Title</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="title_id" id="title_id"
                        placeholder="Masukan Judul" value="{{ $banners->title_id }}">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_id">Deskripsi Singkat</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="short_description_id" id="short_description_id"
                        placeholder="Masukan Deskripsi Singkat" value="{{ $banners->short_description_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_id">Deskripsi</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_id" id="description_id" placeholder="Masukan Deskripsi">{{ old('description_id', $banners->description_id) }}</textarea>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="position">Posisi</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="position" id="position"
                        placeholder="Masukan Posisi" value="{{ $banners->position }}">
                </div>
            </div>

        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
        </div>
</form>
