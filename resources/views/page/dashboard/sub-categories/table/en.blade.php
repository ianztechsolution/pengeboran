<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th style="width: 100px">Icon</th>
                <th>Title</th>
                <th>Parent</th>
                <th>Description</th>
                <th style="width: 100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sub_categories as $sub_category)
            <tr>
                <td>{{ $loop->iteration + $sub_categories->firstItem() - 1 }}</td>
                <td><img src="{{ $sub_category->child->image_icon }}" width="100px"/></td>
                <td>{{ $sub_category->child->title_en }}</td>
                <td>{!! $sub_category->parent_link !!}</td>
                <td>{{ $sub_category->child->short_description_en }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                            data-modal-title="Detail Sub Category" data-modal-size="lg"
                            data-render-route="{{ route('dashboard.sub-categories.show',['sub_category' => $sub_category->child->id]) }}">
                            <i class="feather_icon color_theme" data-feather="eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                            data-modal-title="Edit Sub Category" data-modal-size="lg"
                            data-render-route="{{ route('dashboard.sub-categories.edit',['sub_category' => $sub_category->child->id]) }}">
                            <i class="feather_icon color_theme" data-feather="edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Delete"
                            data-modal-title="Delete Sub Category"
                            data-render-route="{{ route('dashboard.sub-categories.delete',['sub_category' => $sub_category->child->id]) }}">
                            <i class="feather_icon color_theme" data-feather="trash-2"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
