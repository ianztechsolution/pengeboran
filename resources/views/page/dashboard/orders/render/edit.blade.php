<form action="{{ route('dashboard.orders.update', $orders->id) }}" method="post" class="ajax_form"
    data-after-submit="reload" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="tab-content mb-4" id="languageTabContent">
        <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab">

            <input type="hidden" name="orderable_type" id="orderable_type"
                value="{{ old('orderable_type', $orders->orderable_type) }}">

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="orderable_id" class="required">{{ $orderable_title }}</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select select2" name="orderable_id" id="orderable_id">
                        @foreach ($orderable_id as $item)
                            <option value="{{ $item->id }}"
                                {{ old('orderable_id', $orders->orderable_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="room_code" class="required">Room Code</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="room_code" id="room_code"
                        value="{{ old('room_code', $orders->room_code) }}" placeholder="Enter Room Code">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="customer_name" class="required">Customer Name</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="text" class="form-control" name="customer_name" id="customer_name"
                        value="{{ old('customer_name', $orders->customer_name) }}" placeholder="Enter Customer Name">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="customer_phone" class="required">Customer Phone</label>
                </div>
                <div class="col-12 col-lg-8">
                    <input type="number" class="form-control" name="customer_phone" id="customer_phone"
                        value="{{ old('customer_phone', $orders->customer_phone) }}" placeholder="Enter Customer Phone">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-12 col-lg-4 mb-1">
                    <label for="status">status</label>
                </div>
                <div class="col-12 col-lg-8">
                    <select class="form-select" name="status" id="status">
                        <option value="pending" {{ old('status', $orders->status) == 'pending' ? 'selected' : '' }}>
                            Pending</option>
                        <option value="confirmed"
                            {{ old('status', $orders->status) == 'confirmed' ? 'selected' : '' }}>
                            Confirmed</option>
                        <option value="on process"
                            {{ old('status', $orders->status) == 'on process' ? 'selected' : '' }}>On Process</option>
                        <option value="on delivery"
                            {{ old('status', $orders->status) == 'on delivery' ? 'selected' : '' }}>On Delivery
                        </option>
                        <option value="done" {{ old('status', $orders->status) == 'done' ? 'selected' : '' }}>Done
                        </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-sm btn_theme" style="min-width: 150px">Save</button>
    </div>
</form>
