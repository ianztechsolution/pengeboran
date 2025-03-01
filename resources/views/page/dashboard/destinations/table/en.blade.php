<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Availability</th>
                <th style="width: 100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($destinations as $item)
                <tr>
                    <td>{{ $loop->iteration + $destinations->firstItem() - 1 }}</td>
                    <td>{{ $item->title_en }}</td>
                    <td>{{ Str::limit($item->description_en,30) }}</td>
                    <td>
                        <span class="badge bg-{{ $item->availability === 'available' ? 'success' : 'danger' }} w-50">
                            {{ ucwords($item->availability) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a type="button" class="btn btn-sm btn-light" title="Comments"
                            href="{{ route('dashboard.destinations.comments', ['commentable_id' => $item->id]) }}">
                            <i class="feather_icon color_theme" data-feather="message-circle"></i>
                             </a>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail Destinations" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.destinations.show', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit Destinations" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.destinations.edit', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                                data-modal-title="Hapus Destinations"
                                data-render-route="{{ route('dashboard.destinations.delete', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
