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
<form action="{{ route('dashboard.vouchers.update', $vouchers->id) }}" method="post" class="ajax_form"
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
                    @if ($vouchers->images)
                        <div class="row row-cols-3 row-cols-lg-4">
                            @foreach ($vouchers->images as $image)
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
                    <label for="code" class="required">Code</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="code" id="code" placeholder="Enter Code"
                        value="{{ $vouchers->code }}" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="start_time" class="required">Start Time</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="datetime-local" class="form-control" name="start_time" id="start_time"
                        value="{{ old('start_time', $vouchers->start_time ? date('Y-m-d\TH:i', strtotime($vouchers->start_time)) : '') }}"
                        placeholder="Enter Start Time" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="end_time" class="required">End Time</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="datetime-local" class="form-control" name="end_time" id="end_time"
                        value="{{ old('end_time', $vouchers->end_time ? date('Y-m-d\TH:i', strtotime($vouchers->end_time)) : '') }}"
                        placeholder="Enter End Time" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="type" class="required">Type</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-control" name="type" id="type" required>
                        <option value="percentage" {{ old('type', $vouchers->type) == 'percentage' ? 'selected' : '' }}>
                            Percentage
                        </option>
                        <option value="fixed_amount"
                            {{ old('type', $vouchers->type) == 'fixed_amount' ? 'selected' : '' }}>Fixed Amount
                        </option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="apply_method" class="required">Apply Method</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-control" name="apply_method" id="apply_method" required>
                        <option value="specific_product"
                            {{ old('apply_method', $vouchers->apply_method) == 'specific_product' ? 'selected' : '' }}>
                            Specific Product</option>
                        <option value="specific_product_and_total_transaction"
                            {{ old('apply_method', $vouchers->apply_method) == 'specific_product_and_total_transaction' ? 'selected' : '' }}>
                            Specific Product & Total Transaction</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="product" class="required">Product</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="js-example-basic-multiple" name="product[]" id="product" multiple="multiple">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" 
                                {{ in_array($product->id, $selectedProducts) ? 'selected' : '' }}>
                                {{ $product->name_en }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="status" class="required">Status</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="status" id="status">
                        <option value="active" {{ old('status', $vouchers->status) == 'active' ? 'selected' : '' }}>
                            active</option>
                        <option value="inactive"
                            {{ old('status', $vouchers->status) == 'inactive' ? 'selected' : '' }}>inactive</option>
                    </select>
                </div>
            </div>
            

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="title_en" class="required">Title</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="title_en" id="title_en"
                        placeholder="Enter title" value="{{ $vouchers->title_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="period_en" class="required">Period</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="period_en" id="period_en"
                        placeholder="Enter Period" value="{{ $vouchers->period_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="value_en" class="required">Value</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="value_en" id="value_en" step="0.01"
                        min="0" max="9999999999999.99" placeholder="Enter value"
                        value="{{ $vouchers->value_en }}">

                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="minimum_total_transaction_en" class="required">Minimun Total Transaction</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="minimum_total_transaction_en"
                        id="minimum_total_transaction_en" step="0.01" min="0" max="9999999999999.99"
                        placeholder="Enter Minimun Total Transaction"
                        value="{{ $vouchers->minimum_total_transaction_en }}">

                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_en">Short Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="short_description_en" id="short_description_en"
                        placeholder="Enter short description" value="{{ $vouchers->short_description_en }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_en">Description</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_en" id="description_en" placeholder="Enter description">{{ $vouchers->description_en }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="terms_condition_en">Terms Condition</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="terms_condition_en" id="terms_condition_en"
                        placeholder="Enter Terms Condition">{{ $vouchers->terms_condition_en }}</textarea>
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
                    @if ($vouchers->images)
                        <div class="row row-cols-3 row-cols-lg-4">
                            @foreach ($vouchers->images as $image)
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
                        placeholder="Masukan Judul" value="{{ $vouchers->title_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="period_id" class="required">Periode</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="period_id" id="period_id"
                        placeholder="Masukan Periode" value="{{ $vouchers->period_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="value_id" class="required">Nilai</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="value_id" id="value_id" step="0.01"
                        min="0" max="9999999999999.99" placeholder="Masukan Nilai"
                        value="{{ $vouchers->value_id }}">

                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="minimum_total_transaction_id" class="required">Minimum Total Transaksi</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="minimum_total_transaction_id"
                        id="minimum_total_transaction_id" step="0.01" min="0" max="9999999999999.99"
                        placeholder="Masukan Minimum Total Transaksi"
                        value="{{ $vouchers->minimum_total_transaction_id }}">

                </div>
            </div>


            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="short_description_id">Deskripsi Singkat</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="short_description_id" id="short_description_id"
                        placeholder="Enter Deskripsi Singkat" value="{{ $vouchers->short_description_id }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="description_id">Deskripsi</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="description_id" id="description_id" placeholder="Masukan Deskripsi">{{ $vouchers->description_id }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="terms_condition_id">Syarat Kententuan</label>
                </div>
                <div class="col-12 col-lg-8">
                    <textarea class="form-control" name="terms_condition_id" id="terms_condition_id"
                        placeholder="Masukan Syarat Ketentuan">{{ $vouchers->terms_condition_id }}</textarea>
                </div>
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: "Select products",
            allowClear: true,
            width: '100%'
        });
    });
    </script>