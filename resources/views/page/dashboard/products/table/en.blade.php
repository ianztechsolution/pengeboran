<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Code</th>
                <th style="width: 100px">Images</th>
                <th>Name</th>
                <th>Short Description</th>
                <th>Availability</th>
                <th style="width: 100px">Action</th>
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
                                    @if ($image->path_en)
                                        <div class="col mb-3">
                                            <img src="{{ $image->path_en }}" class="img-fluid" alt="Image">
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endif
                    </td>
                    <td>{{ $item->name_en }}</td>
                    <td>{{ $item->short_description_en }}</td>
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
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit Product" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.products.edit', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Delete"
                                data-modal-title="Delete Product"
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
