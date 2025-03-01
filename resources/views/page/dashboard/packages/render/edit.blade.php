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
<form action="{{ route('dashboard.packages.update', $package->id) }}" method="post" class="ajax_form" data-after-submit="reload"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="packageble_type" id="packageble_type" value="{{ $package->packageble_type }}">
    <input type="hidden" name="packageble_id" id="packageble_id" value="{{ $package->packageble_id }}">

    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="name_en" class="required">Name</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name" value="{{ $package->name_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="detail_en">Details</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="detail_en" id="detail_en" placeholder="Enter Text">{{ $package->detail_en }}</textarea>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="indonesian" role="tabpanel" aria-labelledby="indonesian-tab">
        <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="name_id">Nama Paket</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="name_id" id="name_id" placeholder="Masukkan Nama Paket" value="{{ $package->name_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="detail_id">Detail Paket</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="detail_id" id="detail_id" placeholder="Masukkan Isi">{{ $package->detail_id }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>
