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
                    <div class="col-12 col-lg-9">
                      
                        @if (!empty($setting->business_icon))
                            <img src="{{ Storage::url($setting->business_icon) ?? '' }}" class="img-thumbnail mt-2" width="100" alt="" onerror="this.onerror=null;this.src='';" />
                        @else
                            <img src="" alt="" srcset="" class="img-thumbnail mt-2" width="100">
                        @endif
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                               
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
                        @if (!empty($setting->business_logo))
                            <img src="{{ Storage::url($setting->business_logo) ?? '' }}" class="img-thumbnail mt-2" width="100" alt="" onerror="this.onerror=null;this.src='';" />
                        @else
                            <img src="" alt="" srcset="" class="img-thumbnail mt-2" width="100">
                        @endif
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                             @csrf
                             @if(isset($setting->id))
                                 @method('put')
                             @endif
                      
                             <input type="file" class="form-control" name="business_logo" id="business_logo"
                             placeholder="Enter Business Icon">
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
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
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
                        <label for="business_address">Address</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                             @csrf
                             @if(isset($setting->id))
                                 @method('put')
                             @endif
                            <textarea name="business_address" placeholder="Enter business address" id="business_address"  class="form-control" >{{ $setting->business_address ?? '' }}</textarea>
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
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <textarea name="business_about" placeholder="Enter business about" id="business_about"  class="form-control" >{{ $setting->business_about ?? '' }}</textarea>
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
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <input type="text" class="form-control" value="{{ $setting->business_gmap_link ?? '' }}" name="business_gmap_link" id="business_gmap_link"
                            placeholder="Enter gmap link">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="business_gmap_link">
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
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <input type="number" class="form-control" value="{{ $setting->business_phone ?? '' }}" name="business_phone" id="business_phone"
                            placeholder="Enter phone">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="business_phone">
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
                        <label for="zendesk_key">Zendesk</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <input type="text" class="form-control" value="{{ $setting->zendesk_key ?? '' }}" name="zendesk_key" id="zendesk_key"
                            placeholder="Enter Zendesk">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="zendesk_key">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="maintenance_mode">Maintenance Mode</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <select class="form-select" name="maintenance_mode" id="maintenance_mode">
                                <option value="active" {{ isset($setting->maintenance_mode) && $setting->maintenance_mode == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ isset($setting->maintenance_mode) && $setting->maintenance_mode == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="maintenance_mode">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card rounded p-3 mb-3">
                <h5 class="mb-3">Midtrans</h5>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="midtrans_sandbox_key">Sandbox Key</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <input type="text" class="form-control" value="{{ $setting->midtrans_sandbox_key ?? '' }}" name="midtrans_sandbox_key" id="midtrans_sandbox_key"
                            placeholder="Enter sandbox key">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="midtrans_sandbox_key">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                
                </div>
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="midtrans_production_key">Production Key</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <input type="text" class="form-control" value="{{ $setting->midtrans_production_key ?? '' }}" name="midtrans_production_key" id="midtrans_production_key"
                            placeholder="Enter production key">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="midtrans_production_key">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="midtrans_merchant_id">Merchent Id</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <input type="text" class="form-control" value="{{ $setting->midtrans_merchant_id ?? '' }}" name="midtrans_merchant_id" id="midtrans_merchant_id"
                            placeholder="Enter Merchent id">
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="midtrans_merchant_id">
                                <i class="feather_icon" data-feather="save"></i>
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="row mb-1 p-2">
                    <div class="col-12 col-lg-3 my-1">
                        <label for="midtrans_mode">Mode</label>
                    </div>
                    <div class="col-12 col-lg-9">
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <select class="form-select" name="midtrans_mode" id="midtrans_mode">
                                <option value="">Select Mode</option>
                                <option {{ isset($setting->midtrans_mode) && $setting->midtrans_mode == 'sandbox' ? 'selected' : '' }}
                                    value="sandbox">Sandbox</option>
                                <option {{ isset($setting->midtrans_mode) && $setting->midtrans_mode == 'production' ? 'selected' : '' }}
                                    value="production">Production</option>
                            </select>
                            <button type="submit" class="btn btn_theme rounded input-group-text"
                                data-field="midtrans_mode">
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
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <input type="text" class="form-control" value="{{ $setting->smtp_host ?? '' }}" name="smtp_host" id="smtp_host"
                            placeholder="Enter host">
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
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <input type="number" class="form-control" value="{{ $setting->smtp_port ?? '' }}" name="smtp_port" id="smtp_port"
                            placeholder="Enter Port">
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
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <input type="text" class="form-control" value="{{ $setting->smtp_username ?? '' }}" name="smtp_username" id="smtp_username"
                            placeholder="Enter username">
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
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <input type="password" class="form-control" value="{{ $setting->smtp_password ?? '' }}" name="smtp_password" id="smtp_password"
                            placeholder="Enter Password">
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
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
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
                        <form action="{{ isset($setting->id) ? route('dashboard.setting.update', $setting->id) : route('dashboard.setting.store') }}" method="post" class="input-group ajax_form" data-after-submit="reload">
                            @csrf
                            @if(isset($setting->id))
                                @method('put')
                            @endif
                            <input type="text" class="form-control" value="{{ $setting->smtp_from_name ?? '' }}" name="smtp_from_name" id="smtp_from_name" placeholder="Enter from name">
                            <button type="submit" class="btn btn_theme rounded input-group-text" data-field="smtp_from_name">
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

// $(document).ready(function() {
//     $(".change-button").click(function(e) {
//         e.preventDefault();
//         let field = $(this).data("field");
//         let label = $("[for=" + field + "]").text();
//         var formData = new FormData();
 
//         if (field === "business_icon" || field === "business_logo") {
//             var fileInput = $("#" + field)[0].files[0];
//             if (fileInput) {
//                 formData.append("file", fileInput);
//             } else {
//                 alert("Please select a file.");
//                 return;
//             }
//         } else {
//             var value = $("#" + field).val();
//             formData.append("value", value);
//         }

//         formData.append("_token", "{{ csrf_token() }}");
//         formData.append("field", field);

//         $.ajax({
//             url: "{{ route('dashboard.setting.store') }}",
//             type: "POST",
//             data: formData,
//             contentType: false,
//             processData: false,
//             success: function(response) {
//                 var delay = alertify.get('notifier','delay');
//                 alertify.set('notifier','delay', 7);
//                 alertify.success(label+' '+response.message );
//                 alertify.set('notifier','delay', delay); 
//                 alertify.set('notifier','position', 'bottom-right');
//                 if (field === "business_icon" || field === "business_logo") {
//                     setTimeout(function() {
//                         location.reload(); 
//                     }, 1000);
//                 }
//             },
//             error: function(xhr) {
//                 alert("Error updating setting!");
//             }
//         });
//     });
// });
</script>
@endpush


