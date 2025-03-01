<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th style="width: 100px">Icon</th>
                <th>Title</th>
                <th>Description</th>
                <th style="width: 100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration + $categories->firstItem() - 1 }}</td>
                <td><img src="{{ $category->image_icon }}" width="100px"/></td>
                <td>{{ $category->title_en }}</td>
                <td>{{ $category->short_description_en }}</td>
                <td>
                    <div class="d-flex gap-2">
                        @if($enable_sub_category)
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Sub Category"
                                data-modal-title="Sub Category - {{ $category->title_en }}" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.sub-categories.index',['parent_id'=>$category->id]) }}">
                                <i class="feather_icon color_theme" data-feather="list"></i>
                            </button>
                        @endif
                        <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                            data-modal-title="Detail Category" data-modal-size="lg"
                            data-render-route="{{ route('dashboard.categories.show',$category->id) }}">
                            <i class="feather_icon color_theme" data-feather="eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                            data-modal-title="Edit Category" data-modal-size="lg"
                            data-render-route="{{ route('dashboard.categories.edit',$category->id) }}">
                            <i class="feather_icon color_theme" data-feather="edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Delete"
                            data-modal-title="Delete Category"
                            data-render-route="{{ route('dashboard.categories.delete',$category->id) }}">
                            <i class="feather_icon color_theme" data-feather="trash-2"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
