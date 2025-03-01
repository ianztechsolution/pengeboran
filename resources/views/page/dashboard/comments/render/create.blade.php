<form action="{{ route('dashboard.comments.store') }}" method="post" class="ajax_form" data-after-submit="reload"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="commentable_type" id="commentable_type" value="{{ $commentable_type }}">
    <input type="hidden" name="commentable_id" id="commentable_id" value="{{ $commentable_id }}">
    <input type="hidden" name="usertable_type" id="usertable_type" value="{{ App\Models\User::class }}">
    <input type="hidden" name="usertable_id" id="usertable_id" value="{{ auth()->user()->id }}">

    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="image_en">Image</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="file" class="form-control" accept="image/*" name="image_en[]" id="image_en" multiple>
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="message" class="required">Message</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="message" id="message" placeholder="Enter Message"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="post_date" class="required">Date</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="date" class="form-control" name="post_date" id="post_date" placeholder="Enter Date"
                        value="{{ \Carbon\Carbon::today()->toDateString() }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="rating" class="required">Rating</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="rating" id="rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="display">Display</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="display" id="display">
                        <option value="show" selected>Show</option>
                        <option value="hide">Hide</option>
                    </select>
                </div>
            </div>
        </div>


    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>
