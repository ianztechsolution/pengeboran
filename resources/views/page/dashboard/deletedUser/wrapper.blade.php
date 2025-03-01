@extends('layouts.dashboard')
@section('content')
    <div class="d-lg-flex justify-content-between align-items-center mb-4">
        <span class="fs-5 d-block mb-2 mb-lg-0" style="font-weight: 400">{{ $title }}</span>
        {{-- <div class="d-flex gap-2">
            <input type="search" class="form-control bg_transparent_1" name="search" id="search" placeholder="Search"
                value="{{ request('search') }}" />

            <select class="form-select bg_transparent_1" name="status" id="status">
                <option value="">All</option>
                <option value="checking" {{ request('status') == 'checking' ? 'selected' : '' }}>Checking</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>Success</option>
                <option value="cancel" {{ request('status') == 'cancel' ? 'selected' : '' }}>Cancel</option>
                <option value="fail" {{ request('status') == 'fail' ? 'selected' : '' }}>Fail</option>
            </select>
            <button type="button" class="btn btn_theme ajax_modal_btn" title="Add" data-modal-title="Add Transaction"
                data-modal-size="lg" data-render-route="{{ route('dashboard.transaction.create') }}">
                <i class="feather_icon" data-feather="plus"></i>
            </button>
        </div> --}}
    </div>
      
    <div class="row">
        <div class="col-sm-6">
            <div class="card rounded p-3 mb-3">
                <h5 class="mb-3">Business</h5>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_icon">Icon</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        @if (isset($setting->business_icon))
                            <img src="{{Storage::url($setting->business_icon) }}" class="img-thumbnail mt-2" width="100" />
                        @endif
                        <input type="file" class="form-control" name="business_icon" id="business_icon"
                        placeholder="Enter Business Icon">
                    
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="business_icon">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_logo">Logo</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        @if (isset($setting->business_logo))
                            <img src="{{Storage::url($setting->business_logo) }}" class="img-thumbnail mt-2" width="100" />
                        @endif
                        <input type="file" class="form-control" name="business_logo" id="business_logo"
                        placeholder="Enter Business Icon">
                    </div>
                    <div class="col-12 col-lg-1  my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="business_logo">Change</button>

                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_name">Name</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="text" class="form-control" value="{{ $setting->business_name ?? '' }}" name="business_name" id="business_name"
                        placeholder="Enter bussiness name">
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="business_name">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_username">Username</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="text" class="form-control" value="{{ $setting->business_username ?? '' }}" name="business_username" id="business_username"
                        placeholder="Enter business username">
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="business_username">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_address">Address</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <textarea name="business_address" id="business_address" cols="22" class="form-control" rows="10">{{ $setting->business_address ?? '' }}</textarea>
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="business_address">Change</button>

                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_about">About</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <textarea name="business_about" id="business_about" cols="22" class="form-control" rows="10">{{ $setting->business_about ?? '' }}</textarea>
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="business_about">Change</button>

                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_gmap_link">Gmap Link</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="text" value="{{ $setting->business_gmap_link ?? '' }}" class="form-control" name="business_gmap_link" id="business_gmap_link"
                        placeholder="Enter gmap link">
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="business_gmap_link">Change</button>

                    </div>
                </div>
              
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_phone">Phone</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="number" class="form-control" value="{{ $setting->business_phone ?? '' }}" name="business_phone" id="business_phone"
                        placeholder="Enter phone">
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="business_phone">Change</button>

                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_email">Email</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="email" class="form-control" value="{{ $setting->business_email ?? '' }}" name="business_email" id="business_email"
                        placeholder="Enter email">
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="business_email">Change</button>

                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_color">Color</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="color" class="form-control" value="{{ $setting->business_color ?? '#000000' }}" name="business_color" id="business_color"
                        placeholder="Enter color">
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="business_color">Change</button>

                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="business_font">Font</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select class="form-select" name="business_font" id="business_font">
                            <option value="">Select Font</option>
                            <option {{ optional($setting)->business_font == 'Poppins' ? 'selected' : '' }} value="Poppins">Poppins</option>
                            <option {{ optional($setting)->business_font == 'Roboto' ? 'selected' : '' }} value="Roboto">Roboto</option>
                            <option {{ optional($setting)->business_font == 'Rubik' ? 'selected' : '' }} value="Rubik">Rubik</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="business_font">Change</button>

                    </div>
                </div>
                
            </div>
            <div class="card rounded p-3 mb-3">
                <h5 class="mb-3">SMTP</h5>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="smtp_host">Host</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="text" class="form-control" value="{{ $setting->smtp_host ?? '' }}" name="smtp_host" id="smtp_host"
                        placeholder="Enter host">
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="smtp_host">Change</button>

                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="smtp_port">Port</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="number" class="form-control" value="{{ $setting->smtp_port ?? '' }}" name="smtp_port" id="smtp_port" 
                        placeholder="Enter Port">
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="smtp_port">Change</button>

                    </div>
                </div>
                
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="smtp_username">Username</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="text" value="{{ $setting->smtp_username ?? '' }}" class="form-control" name="smtp_username" id="smtp_username"
                        placeholder="Enter username">
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="smtp_username">Change</button>

                    </div>
                </div>
                
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="smtp_password">Password</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="password" value="{{ $setting->smtp_password ?? '' }}" class="form-control" name="smtp_password" id="smtp_password"
                        placeholder="Enter Password">
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="smtp_password">Change</button>

                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="smtp_encryption">Encryption</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="smtp_encryption" id="smtp_encryption" class="form-control">
                            <option value="tls" {{ isset($setting->smtp_encryption) && $setting->smtp_encryption == 'tls' ? 'selected' : '' }}>tls</option>
                            <option value="ssl" {{ isset($setting->smtp_encryption) && $setting->smtp_encryption == 'ssl' ? 'selected' : '' }}>ssl</option>
                     
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="smtp_encryption">Change</button>

                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="smtp_from_name">From Name</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="text" value="{{ $setting->smtp_from_name ?? '' }}" class="form-control" name="smtp_from_name" id="smtp_from_name"
                        placeholder="Enter from name">
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="smtp_from_name">Change</button>

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
                    <div class="col-12 col-lg-7">
                        <select name="module_activity_status" id="module_activity_status" class="form-select">
                            <option value="active" {{ isset($setting->module_activity_status) && $setting->module_activity_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->module_activity_status) && $setting->module_activity_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="module_activity_status">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_food_beverage_status">Food & Beverage Status</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="module_food_beverage_status" id="module_food_beverage_status" class="form-select">
                            <option value="active" {{ isset($setting->module_food_beverage_status) && $setting->module_food_beverage_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->module_food_beverage_status) && $setting->module_food_beverage_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="module_food_beverage_status">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_souvenir_status">Souvenir Status</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="module_souvenir_status" id="module_souvenir_status" class="form-select">
                            <option value="active" {{ isset($setting->module_souvenir_status) && $setting->module_souvenir_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->module_souvenir_status) && $setting->module_souvenir_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="module_souvenir_status">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_amanities_status">Amanities Status</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="module_amanities_status" id="module_amanities_status" class="form-select">
                            <option value="active" {{ isset($setting->module_amanities_status) && $setting->module_amanities_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->module_amanities_status) && $setting->module_amanities_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="module_amanities_status">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_facility_status">Facility Status</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="module_facility_status" id="module_facility_status" class="form-select">
                            <option value="active" {{ isset($setting->module_facility_status) && $setting->module_facility_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->module_facility_status) && $setting->module_facility_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="module_facility_status">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_event_status">Event Status</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="module_event_status" id="module_event_status" class="form-select">
                            <option value="active" {{ isset($setting->module_event_status) && $setting->module_event_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->module_event_status) && $setting->module_event_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="module_event_status">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_destination_status">Destination Status</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="module_destination_status" id="module_destination_status" class="form-select">
                            <option value="active" {{ isset($setting->module_destination_status) && $setting->module_destination_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->module_destination_status) && $setting->module_destination_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="module_destination_status">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_information_status">Information Status</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="module_information_status" id="module_information_status" class="form-select">
                            <option value="active" {{ isset($setting->module_information_status) && $setting->module_information_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->module_information_status) && $setting->module_information_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="module_information_status">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_banner_status">Banner Status</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="module_banner_status" id="module_banner_status" class="form-select">
                            <option value="active" {{ isset($setting->module_banner_status) && $setting->module_banner_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->module_banner_status) && $setting->module_banner_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="module_banner_status">Change</button>
                    </div>
                </div>

                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_promo_status">Promo Status</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="module_promo_status" id="module_promo_status" class="form-select">
                            <option value="active" {{ isset($setting->module_promo_status) && $setting->module_promo_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->module_promo_status) && $setting->module_promo_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="module_promo_status">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_media_status">Media Status</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="module_media_status" id="module_media_status" class="form-select">
                            <option value="active" {{ isset($setting->module_media_status) && $setting->module_media_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->module_media_status) && $setting->module_media_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="module_media_status">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_zendesk_live_status">Zendesk Live Status</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="module_zendesk_live_status" id="module_zendesk_live_status" class="form-select">
                            <option value="active" {{ isset($setting->module_zendesk_live_status) && $setting->module_zendesk_live_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->module_zendesk_live_status) && $setting->module_zendesk_live_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="module_zendesk_live_status">Change</button>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="module_whatsapp_live_status">WhatsApp Live Status</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="module_whatsapp_live_status" id="module_whatsapp_live_status" class="form-select">
                            <option value="active" {{ isset($setting->module_whatsapp_live_status) && $setting->module_whatsapp_live_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->module_whatsapp_live_status) && $setting->module_whatsapp_live_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 my-auto">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="module_whatsapp_live_status">Change</button>
                    </div>
                </div>


            </div>
           
            <div class="card rounded p-3 mb-3">
                <h5 class="mb-3">Others</h5>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="zendesk_key">Zendesk</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="text" value="{{ $setting->zendesk_key ?? '' }}" class="form-control" name="zendesk_key" id="zendesk_key"
                        placeholder="Enter Zendesk">
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="zendesk_key">Change</button>

                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="whatsapp_support">Whatsapp Support</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <input type="number" value="{{ $setting->whatsapp_support ?? '' }}" class="form-control" name="whatsapp_support" id="whatsapp_support"
                        placeholder="Enter whatsapp">
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="whatsapp_support">Change</button>

                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="notification_email_status">Notification Email</label>
                    </div>
                    <div class="col-12 col-lg-7">
                        <select name="notification_email_status" id="notification_email_status" class="form-select">
                            <option value="active" {{ isset($setting->notification_email_status) && $setting->notification_email_status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ isset($setting->notification_email_status) && $setting->notification_email_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-1 ">
                        <button type="submit" class="btn btn-dark rounded change-button" data-field="notification_email_status">Change</button>

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
                var delay = alertify.get('notifier','delay');
                alertify.set('notifier','delay', 7);
                alertify.success(label+' '+response.message );
                alertify.set('notifier','delay', delay); 
                alertify.set('notifier','position', 'bottom-right');
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


