<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th style="width: 100px">Image</th>
                <th style="width: 200px">Title</th>
                <th style="width: 70px">Start Date</th>
                <th style="width: 70px">End Date</th>
                <th style="width: 70px">Short Description</th>
                <th style="width: 70px">Status</th>
                <th style="width: 100px">Action</th>
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
                                    @if ($image->path_en)
                                        <div class="col mb-3">
                                            <img src="{{ $image->path_en }}" class="img-fluid" alt="Image">
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endif
                    </td>
                    <td>{{ $event->title_en }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>
                    <td>{{ $event->short_description_en }}</td>
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
