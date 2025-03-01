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
<form action="{{ route('dashboard.destinations.update', $destinations->id) }}" method="post" class="ajax_form"
    data-after-submit="reload" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="image_en">Image</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" class="form-control" name="image_en[]" id="image_en" multiple>
                    @if ($destinations->images)
                        <div class="row row-cols-3 row-cols-lg-4">
                            @foreach ($destinations->images as $image)
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
                    <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Enter title"
                        value="{{ $destinations->title_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="location_en" class="required">Location</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="location_en" id="location_en"
                        placeholder="Enter Location" value="{{ $destinations->location_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="distance_en" class="required">Distance</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name=" distance_en" id="distance_en"
                        placeholder="Enter Distance" value="{{ $destinations->distance_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_en">Short Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="short_description_en" id="short_description_en"
                        placeholder="Enter Short Description" value="{{ $destinations->short_description_en }}">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_en">Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_en" id="description_en" placeholder="Enter Description">{{ old('description_en', $destinations->description_en) }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="note_en">Note</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="note_en" id="note_en"
                        placeholder="Enter Note" value="{{ $destinations->note_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="gmap_link">Google Map Link</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="gmap_link" id="gmap_link"
                        placeholder="Enter Google Map Link " value="{{ $destinations->gmap_link }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="availability" class="required">Availability</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="availability" id="availability">
                        <option value="available" @selected(old('display', $destinations->availability) == 'available')>Available</option>
                        <option value="inavailable" @selected(old('display', $destinations->availability) == 'inavailable')>Inavailable</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="indonesian" role="tabpanel" aria-labelledby="indonesian-tab">

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="image_id">Foto</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" class="form-control" name="image_id[]" id="image_id" multiple>
                    @if ($destinations->images)
                        <div class="row row-cols-3 row-cols-lg-4">
                            @foreach ($destinations->images as $image)
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
                    <label for="title_id" class="required">Judul</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="title_id" id="title_id"
                        placeholder="Masukkan judul" value="{{ $destinations->title_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="location_id" class="required">Lokasi</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="location_id" id="location_id"
                        placeholder="Masukan Lokasi" value="{{ $destinations->location_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="distance_id" class="required">Jarak</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="distance_id" id="distance_id"
                        placeholder="Masukan Jarak" value="{{ $destinations->distance_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_id">Deskripsi Singkat</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="short_description_id" id="short_description_id"
                        placeholder="Masukkan Deskripsi Singkat" value="{{ $destinations->short_description_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_id">Deskripsi</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_id" id="description_id" placeholder="Masukan Deskripsi">{{ old('description_id', $destinations->description_id) }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="note_id">Catatan</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="note_id" id="note_id"
                        placeholder="Masukan Catatan" value="{{ $destinations->note_id }}">
                </div>
            </div>

        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>
