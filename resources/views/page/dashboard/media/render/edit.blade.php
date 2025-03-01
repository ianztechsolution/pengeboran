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
<form action="{{ route('dashboard.media.update', $media->id) }}" method="post" class="ajax_form"
    data-after-submit="reload" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label class="form-label ">Thumbnail </label>
                </div>
                <div class="col-12 col-lg-8" id="thumbnail_en">
                    <input type="file" class="form-control" accept="image/*" name="thumbnail_en" id="thumbnail_en">
                </div>
            </div>

            @if (!empty($media->image_en))
                @if($media->type === 'image')
                    <img src="{{ Storage::url($media->image_en) }}" alt="Image" style="width: 100%; height: 400px; object-fit: contain;">
                @else
                    <img src="{{ $media->image_en }}" alt="Image" style="width: 100%; height: 400px; object-fit: contain;">
                @endif
             @endif

             @if($status === 'gallery video')
             <li class="list-group-item d-flex flex-column justify-content-between border-top-0" style="border-radius: 0">
                 <b>Thumbnail:</b>
                 @if (!empty($media->thumbnail_en))
                 <img src="{{ Storage::url($media->thumbnail_en) }}" alt="Image" style="width: 100%; height: 400px; object-fit: contain;">
                 @endif
         
             </li>
             @endif
         

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="type" class="form-label required">Select Type Input</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="type" id="type">
                        <option value="image" {{ old('type', $media->type) === 'image' ? 'selected' : '' }}>Image</option>
                        <option value="image_url" {{ old('type', $media->type) === 'image_url' ? 'selected' : '' }}>Image URL</option>
                        <option value="video" {{ old('type', $media->type) === 'video' ? 'selected' : '' }}>Video</option>
                        <option value="video_url" {{ old('type', $media->type) === 'video_url' ? 'selected' : '' }}>Video URL</option>
                    </select>
                    
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label class="form-label ">Media Input (En)</label>
                </div>
                    <div class="col-12 col-lg-8" id="input-container-en">
                        @if(in_array($media->type, ['image', 'video']))
                            <input type="file" class="form-control" accept="image/*,video/*" name="media_en" id="media_input_en">
                        @else
                            <input type="text" class="form-control" name="media_url_id" id="media_input_en" placeholder="Enter Media URL">
                        @endif
                    </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="title_en" class="">Title</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" value="{{$media->title_en}}" class="form-control" name="title_en" id="title_en" placeholder="Enter Title">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="caption_en">Caption</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" value="{{$media->caption_en}}" name="caption_en" id="caption_en"
                        placeholder="Enter Caption">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="visibility">visibility</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="visibility" id="visibility">
                        <option value="visible" {{ old('visibility', $media->visibility) === 'visible' ? 'selected' : '' }}>Visible</option>
                        <option value="invisible" {{ old('visibility', $media->visibility) === 'invisible' ? 'selected' : '' }}>Invisible</option>
                    </select>
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="indonesian" role="tabpanel" aria-labelledby="indonesian-tab">

            @if (!empty($media->image_id))
                @if($media->type === 'image')
                    <img src="{{ Storage::url($media->image_id) }}" alt="Image" style="width: 100%; height: 400px; object-fit: contain;">
                @else
                    <img src="{{ $media->image_id }}" alt="Image" style="width: 100%; height: 400px; object-fit: contain;">
                @endif
             @endif

             @if($status === 'gallery video')
             <li class="list-group-item d-flex flex-column justify-content-between border-top-0" style="border-radius: 0">
                 <b>Thumbnail:</b>
                 @if (!empty($media->thumbnail_id))
                 <img src="{{ Storage::url($media->thumbnail_id) }}" alt="Image" style="width: 100%; height: 400px; object-fit: contain;">
                 @endif
             </li>
             @endif

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
                        @if(in_array($media->type, ['image', 'video']))
                            <input type="file" class="form-control" accept="image/*,video/*" name="media_id" id="media_input_id">
                        @else
                            <input type="text" class="form-control" name="media_url_id" id="media_input_id" placeholder="Enter Media URL">
                        @endif
                    </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="title_id" class="">Judul</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" value="{{$media->title_id}}" name="title_id" id="title_id"
                        placeholder="Masukan Judul">
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="caption_en">Caption</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="caption_id" value="{{$media->caption_id}}" id="caption_id"
                        placeholder="Enter Caption">
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

                if ($select.val() !== "image_url" && $select.val() !== "image") {
                    $select.val('image');
                }

                $('#thumbnail_en').prop('disabled', true).closest('.row').hide();
                $('#thumbnail_id').prop('disabled', true).closest('.row').hide();
            } else if (status === 'gallery video') {
                $select.find('option[value="video"]').show();
                $select.find('option[value="video_url"]').show();

                // Pastikan memilih opsi yang sudah dipilih sebelumnya
                if ($select.val() !== "video_url" && $select.val() !== "video") {
                    $select.val('video');
                }
            }

            $select.trigger('change');
        }

        function updateInputFields() {
    let selectedType = $("#type").val();
    let currentType = "{{ $media->type }}";
    let inputContainerEn = $("#input-container-en");
    let inputContainerId = $("#input-container-id");

    let newInputEn, newInputId;

    if (selectedType === "image") {
        newInputEn = $('<input>', {
            type: "file",
            class: "form-control",
            name: "image_en",
            id: "media_input_en",
            accept: "image/*"
        });
        newInputId = $('<input>', {
            type: "file",
            class: "form-control",
            name: "image_id",
            id: "media_input_id",
            accept: "image/*"
        });
    } else if (selectedType === "image_url") {
        newInputEn = $('<input>', {
            type: "text",
            class: "form-control",
            name: "image_en",
            id: "media_input_en",
            placeholder: "Enter Image URL (EN)",
            value: selectedType === currentType ? "{{ $media->image_en }}" : ""
        });
        newInputId = $('<input>', {
            type: "text",
            class: "form-control",
            name: "image_id",
            id: "media_input_id",
            placeholder: "Enter Image URL (ID)",
            value: selectedType === currentType ? "{{ $media->image_id }}" : ""
        });
    } else if (selectedType === "video") {
        newInputEn = $('<input>', {
            type: "file",
            class: "form-control",
            name: "video_en",
            id: "media_input_en",
            accept: "video/*"
        });
        newInputId = $('<input>', {
            type: "file",
            class: "form-control",
            name: "video_id",
            id: "media_input_id",
            accept: "video/*"
        });
    } else if (selectedType === "video_url") {
        newInputEn = $('<input>', {
            type: "text",
            class: "form-control",
            name: "video_en",
            id: "media_input_en",
            placeholder: "Enter Video URL (EN)",
            value: selectedType === currentType ? "{{ $media->video_en }}" : ""
        });
        newInputId = $('<input>', {
            type: "text",
            class: "form-control",
            name: "video_id",
            id: "media_input_id",
            placeholder: "Enter Video URL (ID)",
            value: selectedType === currentType ? "{{ $media->video_id }}" : ""
        });
    }

    inputContainerEn.empty().append(newInputEn);
    inputContainerId.empty().append(newInputId);
}
    updateInputFields();

    $("#type").change(updateInputFields);
});

    </script>
