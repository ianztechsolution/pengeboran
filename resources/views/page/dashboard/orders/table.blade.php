<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Order Type</th>
                <th>Order id</th>
                <th>Room Code</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Status</th>
                <th style="width: 100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $item)
                <tr>
                    <td>{{ $loop->iteration + $orders->firstItem() - 1 }}</td>
                    <td>{{ $item->orderable_type }}</td>
                    <td>{{ $item->orderable_id }}</td>
                    <td>{{ $item->room_code }}</td>
                    <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->customer_phone }}</td>
                    <td>
                        <span
                            class="badge 
                        {{ $item->status === 'pending' ? 'bg-warning' : '' }}
                        {{ $item->status === 'confirmed' ? 'bg-primary' : '' }}
                        {{ $item->status === 'on process' ? 'bg-info' : '' }}
                        {{ $item->status === 'on delivery' ? 'bg-secondary' : '' }}
                        {{ $item->status === 'done' ? 'bg-success' : '' }}">
                            {{ ucwords(str_replace('_', ' ', $item->status)) }}
                        </span>

                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail orders" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.orders.show', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit orders" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.orders.edit', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                                data-modal-title="Hapus orders"
                                data-render-route="{{ route('dashboard.orders.delete', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
