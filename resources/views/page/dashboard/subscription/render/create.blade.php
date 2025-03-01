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
<form action="{{ route('dashboard.subscription.store') }}" method="post" class="ajax_form" data-after-submit="reload"
    enctype="multipart/form-data">
    @csrf
    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="hotel_id">Hotel</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select name="hotel_id" class="form-select select2" id="">
                        <option value="">Select Hotel</option>
                        @foreach ($hotel as $item)
                            <option value="{{ $item->id }}">{{$item->business_name}}</option>
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
                    <input type="number" class="form-control" name="price_en" id="price_en"
                        placeholder="Enter short price">
                </div>
            </div>
            

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="duration_day"  class="required">Duration</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="duration_day" id="duration_day"
                    placeholder="Enter short duration">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="start_date">Start Date</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="date" class="form-control" name="start_date" id="">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="status" class="required">Status</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="status" id="status">
                        <option value="pending">Pending</option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="note_en">Note</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="note_en" id="note_en"
                        placeholder="Enter short note">
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="indonesian" role="tabpanel" aria-labelledby="indonesian-tab">
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="title_id" class="required">Judul</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="title_id" id="title_id" placeholder="Massukan Judul">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                <label for="price_id"  class="required">Harga</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="price_id" id="price_id"
                        placeholder="Masukkan harga">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="note_id">Catatan</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="note_id" id="note_id"
                        placeholder="Masukkan catatan">
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>
