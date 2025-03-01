<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Judul</th>
                <th>Period</th>
                <th>Code</th>
                <th>type</th>
                <th>value</th>
                <th style="width: 100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vouchers as $item)
                <tr>
                    <td>{{ $loop->iteration + $vouchers->firstItem() - 1 }}</td>
                    <td>{{ $item->title_id }}</td>
                    <td>{{ $item->period_id }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ ucwords(str_replace('_', ' ', $item->type)) }}</td>
                    <td>{{ $item->value_id }}</td>

                    <td>
                        <span class="badge bg-{{ $item->status === 'active' ? 'success' : 'danger' }} ">
                            {{ ucwords($item->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail Voucher" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.vouchers.show', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit Voucher" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.vouchers.edit', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                                data-modal-title="Hapus Voucher"
                                data-render-route="{{ route('dashboard.vouchers.delete', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
