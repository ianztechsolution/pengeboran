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
<form action="{{ route('dashboard.media.store') }}" method="post" class="ajax_form" data-after-submit="reload"
    enctype="multipart/form-data">
    @csrf
    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
              
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label class="form-label ">Thumbnail </label>
                </div>
                <div class="col-12 col-lg-8" id="">
                    <input type="file" class="form-control" accept="image/*" name="thumbnail_en" id="thumbnail_en">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="type" class="form-label required">Select Type Input</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="type" id="type">
                        <option value="image" selected>Image</option>
                        <option value="image_url">Image URL</option>
                        <option value="video">Video</option>
                        <option value="video_url">Video URL</option>
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label class="form-label ">Media Input (EN)</label>
                </div>
                <div class="col-12 col-lg-8" id="input-container-en">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="title_en" class="">Title</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="title_en" id="title_en" placeholder="Enter Title">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="caption_en">Caption</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="caption_en" id="caption_en"
                        placeholder="Enter Caption">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="visibility">visibility</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="visibility" id="visibility">
                        <option value="visible" selected>visible</option>
                        <option value="invisible">invisible</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="indonesian" role="tabpanel" aria-labelledby="indonesian-tab">

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label class="form-label ">Thumbnail </label>
                </div>
                <div class="col-12 col-lg-8" id="thumbnail_id">
                    <input type="file" class="form-control" accept="image/*" name="thumbnail_id" id="thumbnail_id">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label class="form-label ">Media Input (ID)</label>
                </div>
                <div class="col-12 col-lg-8" id="input-container-id">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="title_id" class="">Judul</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="title_id" id="title_id"
                        placeholder="Masukan Judul">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="caption_en">Caption</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="caption_id" id="caption_id"
                        placeholder="Masukan Caption">
                </div>
            </div>
         
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>

<script>
$(document).ready(function () {
    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    if (status) {
        const $select = $("#type");
        $select.find('option').hide();

        if (status === 'gallery foto') {
            $select.find('option[value="image"]').show();
            $select.find('option[value="image_url"]').show();
            $select.val('image'); 
            $('#thumbnail_en').prop('disabled', true).closest('.row').hide();
            $('#thumbnail_id').prop('disabled', true).closest('.row').hide();
        } else if (status === 'gallery video') {
            $select.find('option[value="video"]').show();
            $select.find('option[value="video_url"]').show();
            $select.val('video'); 
        }
    }

    function updateInputFields() {
        let selectedType = $("#type").val();
        let inputContainerEn = $("#input-container-en");
        let inputContainerId = $("#input-container-id");

        let newInputEn, newInputId;

        if (selectedType === "image") {
            newInputEn = $('<input>', {
                type: "file",
                class: "form-control",
                name: "image_en",
                id: "media_input_en",
                accept: "image/*",
                required: true
            });
            newInputId = $('<input>', {
                type: "file",
                class: "form-control",
                name: "image_id",
                id: "media_input_id",
                accept: "image/*",
            });
        } else if (selectedType === "image_url") {
            newInputEn = $('<input>', {
                type: "text",
                class: "form-control",
                name: "image_en",
                id: "media_input_en",
                placeholder: "Enter Image URL (EN)",
                required: true
            });
            newInputId = $('<input>', {
                type: "text",
                class: "form-control",
                name: "image_id",
                id: "media_input_id",
                placeholder: "Enter Image URL (ID)",
            });
        } else if (selectedType === "video") {
            newInputEn = $('<input>', {
                type: "file",
                class: "form-control",
                name: "video_en",
                id: "media_input_en",
                accept: "video/*",
                required: true
            });
            newInputId = $('<input>', {
                type: "file",
                class: "form-control",
                name: "video_id",
                id: "media_input_id",
                accept: "video/*",
            });
        } else if (selectedType === "video_url") {
            newInputEn = $('<input>', {
                type: "text",
                class: "form-control",
                name: "video_en",
                id: "media_input_en",
                placeholder: "Enter Video URL (EN)",
                required: true
            });
            newInputId = $('<input>', {
                type: "text",
                class: "form-control",
                name: "video_id",
                id: "media_input_id",
                placeholder: "Enter Video URL (ID)",
            });
        }

        inputContainerEn.empty().append(newInputEn);
        inputContainerId.empty().append(newInputId);
    }

    updateInputFields();

    $("#type").change(updateInputFields);
});

    </script>