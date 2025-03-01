<form action="{{ route('dashboard.comments.update', $comment->id) }}" method="post" class="ajax_form"
    data-after-submit="reload" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="usertable_type" id="usertable_type" value="{{ App\Models\User::class }}">
    <input type="hidden" name="usertable_id" id="usertable_id" value="{{ auth()->user()->id }}">

    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="image_en">Image</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" class="form-control" name="image_en[]" id="image_en" multiple>
                    @if ($comment->images)
                        <div class="row row-cols-3 row-cols-lg-4">
                            @foreach ($comment->images as $image)
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
                    <label for="message" class="required">Message</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="message" id="message" placeholder="Enter Message">{{ $comment->message }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="post_date" class="required">Date</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="date" class="form-control" name="post_date" id="post_date" placeholder="Enter Date"
                        value="{{ $comment->post_date ? $comment->post_date->format('Y-m-d') : '' }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="rating" class="required">Rating</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="rating" id="rating">
                        <option value="1" {{ $comment->rating == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $comment->rating == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $comment->rating == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $comment->rating == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $comment->rating == 5 ? 'selected' : '' }}>5</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="display">Display</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="display" id="display">
                        <option value="show" {{ $comment->display == 'show' ? 'selected' : '' }}>Show</option>
                        <option value="hide" {{ $comment->display == 'hide' ? 'selected' : '' }}>Hide</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
        </div>
</form>
