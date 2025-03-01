<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th style="width: 100px">Gambar</th>
                <th style="width: 200px">Judul</th>
                <th style="width: 70px">Tanggal Mulai</th>
                <th style="width: 70px">Tanggal Selesai</th>
                <th style="width: 70px">Deskripsi Singkat</th>
                <th style="width: 70px">Status</th>
                <th style="width: 100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $loop->iteration + $events->firstItem() - 1 }}</td>
                    <td>
                        @if ($event->images)
                            <div class="row row-cols-12 row-cols-lg-12">
                                @if($image = $event->images->first())
                                    @if ($image->path_id)
                                        <div class="col mb-3">
                                            <img src="{{ $image->path_id }}" class="img-fluid" alt="Image">
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endif
                    </td>
                    <td>{{ $event->title_id }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>
                    <td>{{ $event->short_description_id }}</td>
                    <td>
                        <span class="badge bg-{{ $event->availability === 'available' ? 'success' : 'danger' }}">
                            {{ ucwords($event->availability) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail Event" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.events.show', $event->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit Event" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.events.edit', $event->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Delete"
                                data-modal-title="Delete Event"
                                data-render-route="{{ route('dashboard.event.delete', $event->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
