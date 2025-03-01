<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th style="width: 100px">Logo</th>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th style="width: 100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $item)
                <tr>
                    <td>{{ $loop->iteration + $hotels->firstItem() - 1 }}</td>
                    <td><img src="{{ $item->settings->business_logo }}" style="width: 100px"></td>
                    <td>{{ $item->settings->business_name }}</td>
                    <td>{{ $item->settings->business_phone }}</td>
                    <td>{{ $item->settings->business_address }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail Hotel" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.hotel.show', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit Hotel" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.hotel.edit', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                                data-modal-title="Hapus Hotel"
                                data-render-route="{{ route('dashboard.hotel.delete', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
