<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Name</th>
                <th>Price</th>
                <th>Minimum Order</th>
                <th style="width: 100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($package_items as $item)
                <tr>
                    <td>{{ $loop->iteration + $package_items->firstItem() - 1 }}</td>
                    <td>{{ $item->name_en }}</td>
                    <td>{{ \App\Helper\Helper::currencyFormatting($item->price_en, '$ ', 'before', 2,'.',',') }}</td>
                    <td>{{ $item->minimum_order }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail Package Item" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.package-items.show', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit Package Item" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.package-items.edit', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Delete"
                                data-modal-title="Delete Packae Item"
                                data-render-route="{{ route('dashboard.package-items.delete', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
