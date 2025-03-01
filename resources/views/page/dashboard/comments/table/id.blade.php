<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Pengguna</th>
                <th>Penilaian</th>
                <th>Pesan</th>
                <th>Tampilkan</th>
                <th style="width: 100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $item)
                <tr>
                    <td>{{ $loop->iteration + $comments->firstItem() - 1 }}</td>
                    <td>{{ $item->usertable->full_name }}</td>
                    <td>
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i < $item->rating)
                                <i class="feather_icon color_theme" data-feather="star" style="color: gold;"></i>
                            @else
                                <i class="feather_icon color_theme" data-feather="star" style="color: lightgray;"></i>
                            @endif
                        @endfor
                    </td>
                    <td>{{ $item->message }}</td>
                    <td>
                        <span class="badge bg-{{ $item->display === 'show' ? 'success' : 'danger' }} w-50">
                            {{ ucwords($item->display) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail komentar" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.comments.show', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit komentar" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.comments.edit', [$item->id, 'commentable' => 'destinations']) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                                data-modal-title="Hapus komentar"
                                data-render-route="{{ route('dashboard.comments.delete', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
