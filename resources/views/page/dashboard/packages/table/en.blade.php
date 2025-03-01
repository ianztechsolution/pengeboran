<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Name</th>
                <th>Detail</th>
                <th style="width: 100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packages as $item)
                <tr>
                    <td>{{ $loop->iteration + $packages->firstItem() - 1 }}</td>
                    <td>{{ $item->name_en }}</td>
                    <td>{{ $item->detail_en }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Package Items"
                                data-modal-title="Package Item - {{ $item->name_en }}" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.package-items.index', ['package_id' => $item->id]) }}">
                                <i class="feather_icon color_theme" data-feather="list"></i>
                            </button>

                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail Package" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.packages.show', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit Package" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.packages.edit', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Delete"
                                data-modal-title="Delete Package"
                                data-render-route="{{ route('dashboard.packages.delete', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
