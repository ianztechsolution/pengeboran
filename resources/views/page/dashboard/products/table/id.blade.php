<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Kode</th>
                <th style="width: 100px">Gambar</th>
                <th>Nama</th>
                <th>Deskripsi Singkat</th>
                <th>Status</th>
                <th style="width: 100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <tr>
                    <td>{{ $loop->iteration + $products->firstItem() - 1 }}</td>
                    <td>{{ $item->code }}</td>
                    <td>
                        @if ($item->images)
                            <div class="row row-cols-12 row-cols-lg-12">
                                @if($image = $item->images->first())
                                    @if ($image->path_id)
                                        <div class="col mb-3">
                                            <img src="{{ $image->path_id }}" class="img-fluid" alt="Image">
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endif
                    </td>
                    <td>{{ $item->name_id }}</td>
                    <td>{{ $item->short_description_id }}</td>
                    <td>
                        <span class="badge bg-{{ $item->availability === 'available' ? 'success' : 'danger' }}">
                            {{ ucwords($item->availability) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail Product" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.products.show', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Ubah"
                                data-modal-title="Ubah Product" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.products.edit', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                                data-modal-title="Hapus Product"
                                data-render-route="{{ route('dashboard.products.delete', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
