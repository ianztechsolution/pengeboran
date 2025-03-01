<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th style="width: 100px">Gambar</th>
                <th style="width: 200px">Judul</th>
                <th style="width: 70px">Deskripsi Singkat</th>
                <th style="width: 70px">Status</th>
                <th style="width: 100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facilities as $facility)
                <tr>
                    <td>{{ $loop->iteration + $facilities->firstItem() - 1 }}</td>
                    <td>
                        @if ($facility->images)
                            <div class="row row-cols-12 row-cols-lg-12">
                                @if($image = $facility->images->first())
                                    @if ($image->path_id)
                                        <div class="col mb-3">
                                            <img src="{{ $image->path_id }}" class="img-fluid" alt="Image">
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endif
                    </td>
                    <td>{{ $facility->title_id }}</td>
                    <td>{{ $facility->short_description_id }}</td>
                    <td>
                        <span class="badge bg-{{ $facility->availability === 'available' ? 'success' : 'danger' }}">
                            {{ ucwords($facility->availability) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail Facility" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.facilities.show', $facility->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit Facility" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.facilities.edit', $facility->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                                data-modal-title="Hapus Facility"
                                data-render-route="{{ route('dashboard.facility.delete', $facility->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
