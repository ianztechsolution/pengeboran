<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th style="width: 100px">Image</th>
                <th style="width: 200px">Title</th>
                <th style="width: 100px">Category</th>
                <th style="width: 70px">Price</th>
                <th style="width: 70px">Short Description</th>
                <th style="width: 70px">Status</th>
                <th style="width: 100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($souvenirs as $souvenir)
                <tr>
                    <td>{{ $loop->iteration + $souvenirs->firstItem() - 1 }}</td>
                    <td>
                        @if ($souvenir->images)
                            <div class="row row-cols-12 row-cols-lg-12">
                                @if($image = $souvenir->images->first())
                                    @if ($image->path_en)
                                        <div class="col mb-3">
                                            <img src="{{ $image->path_en }}" class="img-fluid" alt="Image">
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endif
                    </td>
                    <td>{{ $souvenir->title_en }}</td>
                    <td>{!! $souvenir->categories_list !!}</td>
                    <td>{{ \App\Helper\Helper::currencyFormatting($souvenir->price_en, '$ ', 'before', 2,'.',',') }}</td>
                    <td>{{ $souvenir->short_description_en }}</td>
                    <td>
                        <span class="badge bg-{{ $souvenir->availability === 'available' ? 'success' : 'danger' }}">
                            {{ ucwords($souvenir->availability) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a type="button" class="btn btn-sm btn-light" title="Packages"
                                href="{{ route('dashboard.souvenirs.packages.index', ['packageble_id' => $souvenir->id ]) }}">
                                <i class="feather_icon color_theme" data-feather="shopping-bag"></i>
                            </a>

                            <a type="button" class="btn btn-sm btn-light" title="Comments"
                                href="{{ route('dashboard.souvenirs.comments', ['commentable_id' => $souvenir->id]) }}">
                                <i class="feather_icon color_theme" data-feather="message-circle"></i>
                            </a>

                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail Souvenir" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.souvenirs.show', $souvenir->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit Souvenir" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.souvenirs.edit', $souvenir->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Delete"
                                data-modal-title="Delete Souvenir"
                                data-render-route="{{ route('dashboard.souvenirs.delete', $souvenir->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
