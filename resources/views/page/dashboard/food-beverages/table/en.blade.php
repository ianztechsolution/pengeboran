<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th style="width: 100px">Image</th>
                <th style="width: 200px">Restaurant</th>
                <th style="width: 200px">Title</th>
                <th style="width: 100px">Category</th>
                <th style="width: 70px">Price</th>
                <th style="width: 70px">Short Description</th>
                <th style="width: 70px">Status</th>
                <th style="width: 100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($food_beverages as $food_beverage)
                <tr>
                    <td>{{ $loop->iteration + $food_beverages->firstItem() - 1 }}</td>
                    <td>
                        @if ($food_beverage->images)
                            <div class="row row-cols-12 row-cols-lg-12">
                                @if($image = $food_beverage->images->first())
                                    @if ($image->path_en)
                                        <div class="col mb-3">
                                            <img src="{{ $image->path_en }}" class="img-fluid" alt="Image">
                                        </div>
                                    @endif
                                @endif
                            </div>
                        @endif
                    </td>
                    <td>{!! $food_beverage->restaurant_link !!}</td>
                    <td>{{ $food_beverage->title_en }}</td>
                    <td>{!! $food_beverage->categories_list !!}</td>
                    <td>{{ \App\Helper\Helper::currencyFormatting($food_beverage->price_en, '$ ', 'before', 2,'.',',') }}</td>
                    <td>{{ $food_beverage->short_description_en }}</td>
                    <td>
                        <span class="badge bg-{{ $food_beverage->availability === 'available' ? 'success' : 'danger' }}">
                            {{ ucwords($food_beverage->availability) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a type="button" class="btn btn-sm btn-light" title="Comments"
                                href="{{ route('dashboard.food-beverages.comments', ['commentable_id' => $food_beverage->id]) }}">
                                <i class="feather_icon color_theme" data-feather="message-circle"></i>
                            </a>

                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail Food & Beverage" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.food-beverages.show', $food_beverage->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit Food & Beverage" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.food-beverages.edit', $food_beverage->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                                data-modal-title="Delete Food & Beverage"
                                data-render-route="{{ route('dashboard.food-beverages.delete', $food_beverage->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
