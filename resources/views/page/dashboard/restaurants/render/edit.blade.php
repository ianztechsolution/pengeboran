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
<form action="{{ route('dashboard.restaurants.update', $restaurant->id) }}" method="post" class="ajax_form" data-after-submit="reload"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="image_en" class="required">Icon</label>
                </div>
                <div class="col-12 col-lg-8">
                    @if ($restaurant->image_icon)
                        <div class="row row-cols-2 row-cols-lg-4">
                            <div class="col mb-3">
                                <div class="image_delete_button"
                                    data-route="{{ route('image.destroy-single-file', ['model' => class_basename($restaurant), 'column' => 'image_icon', 'object_id' => $restaurant->id]) }}">
                                    <img src="{{ $restaurant->image_icon }}" class="img-fluid" alt="Image">
                                </div>
                            </div>
                        </div>
                    @endif
                    <input type="file" class="form-control" name="image_icon" accept="image/*"  id="image_icon">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="image_en" class="required">Images</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" class="form-control" name="image_en[]" id="image_en" multiple>
                    @if ($restaurant->images)
                        <div class="row row-cols-3 row-cols-lg-4">
                            @foreach ($restaurant->images as $image)
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
                    <label for="name_en" class="required">Name</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="name_en" id="name_en" placeholder="Enter name" value="{{ $restaurant->name_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_en">Short Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="short_description_en" id="short_description_en"
                        placeholder="Enter short description" value="{{ $restaurant->short_description_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_en">Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_en" id="description_en" placeholder="Enter description">{{ $restaurant->description_en }}</textarea>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="indonesian" role="tabpanel" aria-labelledby="indonesian-tab">
        <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="image_id">Gambar</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" class="form-control" name="image_id[]" id="image_id" multiple>
                    @if ($restaurant->images)
                        <div class="row row-cols-3 row-cols-lg-4">
                            @foreach ($restaurant->images as $image)
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
                    <label for="name_id">Nama</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="name_id" id="name_id"
                        placeholder="Masukkan nama" value="{{ $restaurant->name_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_id">Deskripsi Singkat</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="short_description_id" id="short_description_id"
                        placeholder="Masukkan deskripsi singkat" value="{{ $restaurant->short_description_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_id">Deskripsi</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_id" id="description_id" placeholder="Masukkan deskripsi">{{ $restaurant->description_id }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>
