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
<form action="{{ route('dashboard.package-items.update', $package_item->id) }}" method="post" class="ajax_form" data-after-submit="reload"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="package_id" id="package_id" value="{{ $package_item->package_id }}">

    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="name_en" class="required">Name</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter Name" value="{{  $package_item->name_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="price_en">Price</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="price_en" id="price_en" placeholder="Enter Price" value="{{  $package_item->price_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="minimum_order">Minimum Order</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="numeric" class="form-control" name="minimum_order" id="minimum_order" placeholder="Enter Minimum Order" value="{{  $package_item->minimum_order }}">
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="indonesian" role="tabpanel" aria-labelledby="indonesian-tab">
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="name_id" class="required">Nama</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="name_id" id="name_id" placeholder="Masukkan Nama" value="{{  $package_item->name_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="price_id">Harga</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="price_id" id="price_id" placeholder="Masukkan Harga" value="{{  $package_item->price_id }}">
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>
