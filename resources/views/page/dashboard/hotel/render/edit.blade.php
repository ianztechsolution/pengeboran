<form action="{{ route('dashboard.hotel.update', $hotel->id) }}" method="post" class="ajax_form" data-after-submit="reload"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <div class="col-12 col-lg-4 mb-1">
            <label for="business_icon">Hotel Icon</label>
        </div>
        <div class="col-12 col-lg-8">
            <input type="file" class="form-control" name="business_icon" id="business_icon">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-lg-4 mb-1">
            <label for="business_logo">Hotel Logo</label>
        </div>
        <div class="col-12 col-lg-8">
            <input type="file" class="form-control" name="business_logo" id="business_logo">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-lg-4 mb-1">
            <label for="business_name" class="required">Hotel Name</label>
        </div>
        <div class="col-12 col-lg-8">
            <input type="text" class="form-control" name="business_name" id="business_name" placeholder="Enter business name" value="{{ $hotel->business_name }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-lg-4 mb-1">
            <label for="business_email">Hotel Email</label>
        </div>
        <div class="col-12 col-lg-8">
            <input type="email" class="form-control" name="business_email" id="business_email" placeholder="Enter business email" value="{{ $hotel->business_email }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-lg-4 mb-1">
            <label for="business_phone">Hotel Phone</label>
        </div>
        <div class="col-12 col-lg-8">
            <input type="number" class="form-control" name="business_phone" id="business_phone" placeholder="Enter business phone" value="{{ $hotel->business_phone }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-lg-4 mb-1">
            <label for="business_address">Hotel Address</label>
        </div>
        <div class="col-12 col-lg-8">
            <textarea class="form-control" name="business_address" id="business_address" placeholder="Enter business address">{{ $hotel->business_address }}</textarea>
        </div>
    </div>

    <b class="d-block mb-3">User Account</b>
   
    <div class="row mb-3">
        <div class="col-12 col-lg-4 mb-1">
            <label for="first_name" class="required">First Name</label>
        </div>
        <div class="col-12 col-lg-8">
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name" value="{{ $hotel->administrator->first_name }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-lg-4 mb-1">
            <label for="last_name">Last Name</label>
        </div>
        <div class="col-12 col-lg-8">
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name" value="{{ $hotel->administrator->last_name }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-lg-4 mb-1">
            <label for="email" class="required">Email</label>
        </div>
        <div class="col-12 col-lg-8">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ $hotel->administrator->email }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-12 col-lg-4 mb-1">
            <label for="password" class="required">Password</label>
        </div>
        <div class="col-12 col-lg-8">
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" autocomplete="new-password">
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>
