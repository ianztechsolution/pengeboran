<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th style="width: 200px">Title</th>
                <th style="width: 100px">Category</th>
                <th style="width: 70px">Location</th>
                <th style="width: 70px">Price</th>
                <th style="width: 70px">Short Description</th>
                <th style="width: 100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $item)
                <tr>
                    <td>{{ $loop->iteration + $activities->firstItem() - 1 }}</td>
                    <td>{{ $item->title_en }}</td>
                    <td>{!! $item->categories_list !!}</td>
                    <td>{{ $item->location_en }}</td>
                    <td>{{ \App\Helper\Helper::currencyFormatting($item->price_en, '$ ', 'before', 2,'.',',') }}</td>
                    <td>{{ $item->short_description_en }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a type="button" class="btn btn-sm btn-light" title="Packages"
                                href="{{ route('dashboard.activities.packages.index', ['packageble_id' => $item->id ]) }}">
                                <i class="feather_icon color_theme" data-feather="shopping-bag"></i>
                            </a>

                            <a type="button" class="btn btn-sm btn-light" title="Comments"
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
                                data-modal-title="Delete Activity"
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
