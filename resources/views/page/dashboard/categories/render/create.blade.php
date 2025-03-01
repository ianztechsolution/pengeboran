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
<form action="{{ route('dashboard.categories.store') }}" method="post" class="ajax_form" data-after-submit="reload"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="type" value="{{ request()->type }}">
    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
                <div class="row mb-3">
                    <div class="col-12 col-lg-4 mb-1">
                        <label for="image_icon" class="required">Icon</label>
                    </div>
                    <div class="col-12 col-lg-8">
                        <input type="file" class="form-control" name="image_icon"  accept="image/*" id="image_icon">
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
                        <label for="short_description_en">Short Description</label>
                    </div>
                    <div class="col-12 col-lg-8">
                        <input type="text" class="form-control" name="short_description_en" id="short_description_en"
                            placeholder="Enter short description">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-lg-4 mb-1">
                        <label for="description_en">Description</label>
                    </div>
                    <div class="col-12 col-lg-8">
                        <textarea class="form-control" name="description_en" id="description_en" placeholder="Enter description"></textarea>
                    </div>
                </div>

        </div>
        <div class="tab-pane fade" id="indonesian" role="tabpanel" aria-labelledby="indonesian-tab">
                <div class="row mb-3">
                    <div class="col-12 col-lg-4 mb-1">
                        <label for="title_id">Judul</label>
                    </div>
                    <div class="col-12 col-lg-8">
                        <input type="text" class="form-control" name="title_id" id="title_id"
                            placeholder="Masukkan judul">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-lg-4 mb-1">
                        <label for="short_description_id">Deskripsi Singkat</label>
                    </div>
                    <div class="col-12 col-lg-8">
                        <input type="text" class="form-control" name="short_description_id" id="short_description_id"
                            placeholder="Masukkan deskripsi singkat">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-lg-4 mb-1">
                        <label for="description_id">Deskripsi</label>
                    </div>
                    <div class="col-12 col-lg-8">
                        <textarea class="form-control" name="description_id" id="description_id" placeholder="Masukkan deskripsi"></textarea>
                    </div>
                </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>
