<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Foto</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Ketersediaan</th>
                <th style="width: 100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $item)
                <tr>
                    <td>{{ $loop->iteration + $banners->firstItem() - 1 }}</td>
                    <td> <img src="{{ Storage::url($item->photo_id) }}" alt="Banner" style="width: 150px; height: auto; "></td>
                    <td>{{ $item->title_id }}</td>
                    <td>{{ $item->short_description_id }}</td>
                    <td>
                        <span class="badge bg-{{ $item->display === 'show' ? 'success' : 'danger' }}">
                            {{ ucwords($item->display) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail Bannersgit pu" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.banners.show', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit Banners" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.banners.edit', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                                data-modal-title="Hapus Banners"
                                data-render-route="{{ route('dashboard.banners.delete', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
