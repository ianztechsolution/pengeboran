<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th style="width: 200px">Judul</th>
                <th style="width: 100px">Kategori</th>
                <th style="width: 70px">Lokasi</th>
                <th style="width: 70px">Harga</th>
                <th style="width: 70px">Deskripsi Singkat</th>
                <th style="width: 100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $item)
                <tr>
                    <td>{{ $loop->iteration + $activities->firstItem() - 1 }}</td>
                    <td>{{ $item->title_id }}</td>
                    <td>{!! $item->categories_list !!}</td>
                    <td>{{ $item->location_id }}</td>
                    <td>{{ \App\Helper\Helper::currencyFormatting($item->price_id, 'Rp. ') }}</td>
                    <td>{{ $item->short_description_id }}</td>
                    <td>
                        <div class="d-flex gap-2">
                        <a type="button" class="btn btn-sm btn-light" title="Paket"
                                href="{{ route('dashboard.activities.packages.index', ['packageble_id' => $item->id ]) }}">
                                <i class="feather_icon color_theme" data-feather="shopping-bag"></i>
                            </a>

                            <a type="button" class="btn btn-sm btn-light" title="Komentar"
                                href="{{ route('dashboard.activities.comments', ['commentable_id' => $item->id]) }}">
                                <i class="feather_icon color_theme" data-feather="message-circle"></i>
                            </a>
                        
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail Activity" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.activities.show', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit Activity" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.activities.edit', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                                data-modal-title="Hapus Activity"
                                data-render-route="{{ route('dashboard.activities.delete', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
