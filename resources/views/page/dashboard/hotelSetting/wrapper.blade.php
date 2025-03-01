@extends('layouts.dashboard')
@section('content')
    <div class="d-lg-flex justify-content-between align-items-center mb-4">
        <span class="fs-5 d-block mb-2 mb-lg-0" style="font-weight: 400">{{ $title }}</span>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card rounded p-3 mb-3">
                <h5 class="mb-3">Business</h5>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_icon">Icon</label>
                    </div>
                    <div class="col-12 col-lg-9">
                            <img src="{{ $setting->business_icon ?? '' }}" class="img-thumbnail mt-2"
                                width="100" />
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="file" class="form-control" name="business_icon" id="business_icon"
                                placeholder="Enter Business Icon">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="business_icon">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_logo">Logo</label>
                    </div>
                    <div class="col-12 col-lg-9">
                            <img src="{{ $setting->business_logo ?? '' }}" class="img-thumbnail mt-2"
                                width="100" />
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="file" class="form-control" name="business_logo" id="business_logo"
                                placeholder="Enter Business Logo">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="business_logo">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_name">Name</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <input type="text" class="form-control" value="{{ $setting->business_name ?? '' }}" name="business_name" id="business_name"
                                placeholder="Enter bussiness name">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="business_name">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_username">Username</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <input type="text" class="form-control" name="business_username"
                                id="business_username" value="{{ $setting->business_username ?? '' }}" placeholder="Enter business username">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="business_username">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_address">Address</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <textarea name="business_address" id="business_address"  class="form-control"  placeholder="Enter business address">{{ $setting->business_address ?? '' }}</textarea>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="business_address">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_about">About</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <textarea name="business_about" id="business_about"  class="form-control"   placeholder="Enter business about">{{ $setting->business_about ?? '' }}</textarea>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="business_about">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_gmap_link">Gmap Link</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <input type="text" value="{{ $setting->business_gmap_link ?? '' }}" class="form-control"
                            name="business_gmap_link" id="business_gmap_link" placeholder="Enter gmap link">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="business_about">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_phone">Phone</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <input type="number" value="{{ $setting->business_phone ?? '' }}" class="form-control"
                            name="business_phone" id="business_phone" placeholder="Enter phone">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="business_phone">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_email">Email</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <input type="email" value="{{ $setting->business_email ?? '' }}" class="form-control"
                            name="business_email" id="business_email" placeholder="Enter email">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="business_email">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_color">Color</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <input type="color" value="{{ $setting->business_color ?? '#000000' }}" class="form-control"
                            name="business_color" id="business_color" placeholder="Enter color">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="business_color">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_font">Font</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="business_font" id="business_font">
                                <option value="">Select Font</option>
                                <option {{ optional($setting)->business_font == 'Poppins' ? 'selected' : '' }}
                                    value="Poppins">Poppins</option>
                                <option {{ optional($setting)->business_font == 'Roboto' ? 'selected' : '' }} value="Roboto">
                                    Roboto</option>
                                <option {{ optional($setting)->business_font == 'Rubik' ? 'selected' : '' }} value="Rubik">
                                    Rubik</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="business_font">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="card rounded p-3 mb-3">
                <h5 class="mb-3">SMTP</h5>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="smtp_host">Host</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <input type="text" class="form-control" value="{{ $setting->smtp_host ?? '' }}"
                                name="smtp_host" id="smtp_host" placeholder="Enter host">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="smtp_host">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="smtp_port">Port</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <input type="number" class="form-control" value="{{ $setting->smtp_port ?? '' }}"
                                name="smtp_port" id="smtp_port" placeholder="Enter Port">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="smtp_port">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="smtp_username">Username</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <input type="text" value="{{ $setting->smtp_username ?? '' }}" class="form-control"
                                name="smtp_username" id="smtp_username" placeholder="Enter username">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="smtp_username">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="smtp_password">Password</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <input type="password" value="{{ $setting->smtp_password ?? '' }}" class="form-control"
                                name="smtp_password" id="smtp_password" placeholder="Enter Password">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="smtp_password">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="smtp_encryption">Encryption</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="smtp_encryption" id="smtp_encryption">
                                <option value="">Select Encryption</option>
                                <option {{ isset($setting->smtp_encryption) && $setting->smtp_encryption == 'tls' ? 'selected' : '' }}
                                    value="tls">tls</option>
                                <option {{ isset($setting->smtp_encryption) && $setting->smtp_encryption == 'ssl' ? 'selected' : '' }}
                                    value="ssl">ssl</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="smtp_encryption">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="smtp_from_name">From Name</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <input type="text" value="{{ $setting->smtp_from_name ?? '' }}" class="form-control"
                                name="smtp_from_name" id="smtp_from_name" placeholder="Enter from name">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="smtp_from_name">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card rounded p-3 mb-3">
                <h5 class="mb-3">Modeule</h5>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_activity_status">Activity Status</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="module_activity_status" id="module_activity_status">
                                <option value="active"
                                    {{ isset($setting->module_activity_status) && $setting->module_activity_status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($setting->module_activity_status) && $setting->module_activity_status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="module_activity_status">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_food_beverage_status">Food & Beverage Status</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="module_food_beverage_status" id="module_food_beverage_status">
                                <option value="active"
                                    {{ isset($setting->module_food_beverage_status) && $setting->module_food_beverage_status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($setting->module_food_beverage_status) && $setting->module_food_beverage_status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="module_food_beverage_status">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_souvenir_status">Souvenir Status</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="module_souvenir_status" id="module_souvenir_status">
                                <option value="active"
                                    {{ isset($setting->module_souvenir_status) && $setting->module_souvenir_status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($setting->module_souvenir_status) && $setting->module_souvenir_status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="module_souvenir_status">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_amanities_status">Amanities Status</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="module_amanities_status" id="module_amanities_status">
                                <option value="active"
                                    {{ isset($setting->module_amanities_status) && $setting->module_amanities_status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($setting->module_amanities_status) && $setting->module_amanities_status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="module_amanities_status">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_facility_status">Facility Status</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post"
                            class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="module_facility_status" id="module_facility_status">
                                <option value="active"
                                    {{ isset($setting->module_facility_status) && $setting->module_facility_status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($setting->module_facility_status) && $setting->module_facility_status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="module_facility_status">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_activity_status">Activity Status</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post"
                            class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="module_activity_status" id="module_activity_status">
                                <option value="active"
                                    {{ isset($setting->module_activity_status) && $setting->module_activity_status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($setting->module_activity_status) && $setting->module_activity_status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="module_activity_status">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_information_status">Information Status</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post"
                            class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="module_information_status" id="module_information_status">
                                <option value="active"
                                    {{ isset($setting->module_information_status) && $setting->module_information_status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($setting->module_information_status) && $setting->module_information_status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="module_information_status">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_banner_status">Banner Status</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post"
                            class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="module_banner_status" id="module_banner_status">
                                <option value="active"
                                    {{ isset($setting->module_banner_status) && $setting->module_banner_status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($setting->module_banner_status) && $setting->module_banner_status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="module_banner_status">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_promo_status">Promo Status</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="module_promo_status" id="module_promo_status">
                                <option value="active"
                                    {{ isset($setting->module_promo_status) && $setting->module_promo_status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($setting->module_promo_status) && $setting->module_promo_status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="module_promo_status">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_media_status">Media Status</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="module_media_status" id="module_media_status">
                                <option value="active"
                                    {{ isset($setting->module_media_status) && $setting->module_media_status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($setting->module_media_status) && $setting->module_media_status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="module_media_status">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_zendesk_live_status">Zendesk Live Status</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="module_zendesk_live_status" id="module_zendesk_live_status">
                                <option value="active"
                                    {{ isset($setting->module_zendesk_live_status) && $setting->module_zendesk_live_status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($setting->module_zendesk_live_status) && $setting->module_zendesk_live_status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="module_zendesk_live_status">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_whatsapp_live_status">WhatsApp Live Status</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="module_whatsapp_live_status" id="module_whatsapp_live_status">
                                <option value="active"
                                    {{ isset($setting->module_whatsapp_live_status) && $setting->module_whatsapp_live_status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($setting->module_whatsapp_live_status) && $setting->module_whatsapp_live_status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="module_whatsapp_live_status">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>


            </div>

            <div class="card rounded p-3 mb-3">
                <h5 class="mb-3">Others</h5>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="zendesk_key">Zendesk Key</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <input type="text" value="{{ $setting->zendesk_key ?? '' }}" class="form-control"
                                name="zendesk_key" id="zendesk_key" placeholder="Enter Zendesk Key">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="zendesk_key">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="whatsapp_support">Whatsapp Support</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <input type="number" value="{{ $setting->whatsapp_support ?? '' }}" class="form-control"
                                name="whatsapp_support" id="whatsapp_support" placeholder="Enter whatsapp">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="whatsapp_support">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="notification_email_status">Notification Email</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ route('dashboard.hotel-setting.update', $hotel_id) }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @method('put')
                            <select class="form-select" name="notification_email_status" id="notification_email_status">
                                <option value="active"
                                    {{ isset($setting->notification_email_status) && $setting->notification_email_status == 'active' ? 'selected' : '' }}>
                                    Active</option>
                                <option value="inactive"
                                    {{ isset($setting->notification_email_status) && $setting->notification_email_status == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="notification_email_status">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>




            </div>
        </div>
    </div>

    {{-- <div class="card bg_transparent_1">
       
      
        <div class="card-body">
            @if (config('app.locale') === 'en')
                @include('page.dashboard.transaction.table.en')
            @elseif (config('app.locale') === 'id')
                @include('page.dashboard.transaction.table.id')
            @endif
        </div>
        <div class="d-flex justify-content-end">
            {{ $informations->links() }}
        </div>
    </div> --}}
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $(".change-button").click(function(e) {
                e.preventDefault();
                let field = $(this).data("field");
                let label = $("[for=" + field + "]").text();
                var formData = new FormData();

                if (field === "business_icon" || field === "business_logo") {
                    var fileInput = $("#" + field)[0].files[0];
                    if (fileInput) {
                        formData.append("file", fileInput);
                    } else {
                        alert("Please select a file.");
                        return;
                    }
                } else {
                    var value = $("#" + field).val();
                    formData.append("value", value);
                }

                formData.append("_token", "{{ csrf_token() }}");
                formData.append("field", field);

                $.ajax({
                    url: "{{ route('dashboard.hotel-setting.store') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var delay = alertify.get('notifier', 'delay');
                        alertify.set('notifier', 'delay', 7);
                        alertify.success(label + ' ' + response.message);
                        alertify.set('notifier', 'delay', delay);
                        alertify.set('notifier', 'position', 'bottom-right');
                        if (field === "business_icon" || field === "business_logo") {
                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        }
                    },
                    error: function(xhr) {
                        alert("Error updating setting!");
                    }
                });
            });
        });
    </script>
@endpush
