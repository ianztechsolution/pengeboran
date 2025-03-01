<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Title</th>
                <th>Caption</th>
                <th>Display</th>
                <th style="width: 100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($media as $item)
                <tr>
                    <td>{{ $loop->iteration + $media->firstItem() - 1 }}</td>
                    <td>{{ $item->title_en }}</td>
                    <td>{{ $item->caption_en }}</td>
                    <td>
                        <span class="badge bg-{{ $item->visibility === 'visible' ? 'success' : 'danger' }} ">
                            {{ ucwords($item->visibility) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail media" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.media.show', ['media' => $item->id, 'status' => request('status')]) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit media" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.media.edit', ['media' => $item->id, 'status' => request('status')]) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                                data-modal-title="Hapus media"
                                data-render-route="{{ route('dashboard.media.delete', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
