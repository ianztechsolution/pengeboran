<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th style="width: 100px">Ikon</th>
                <th>Judul</th>
                <th>Induk</th>
                <th>Deskripsi</th>
                <th style="width: 100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sub_categories as $sub_category)
            <tr>
                <td>{{ $loop->iteration + $sub_categories->firstItem() - 1 }}</td>
                <td><img src="{{ $sub_category->child->image_icon }}" width="100px"/></td>
                <td>{{ $sub_category->child->title_id }}</td>
                <td>{!! $sub_category->parent_link !!}</td>
                <td>{{ $sub_category->child->short_description_id }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                            data-modal-title="Detail Kategori Sub" data-modal-size="lg"
                            data-render-route="{{ route('dashboard.sub-categories.show',['sub_category' => $sub_category->child->id]) }}">
                            <i class="feather_icon color_theme" data-feather="eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Ubah"
                            data-modal-title="Edit Kategori Sub" data-modal-size="lg"
                            data-render-route="{{ route('dashboard.sub-categories.edit',['sub_category' => $sub_category->child->id]) }}">
                            <i class="feather_icon color_theme" data-feather="edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                            data-modal-title="Hapus Kategori Sub"
                            data-render-route="{{ route('dashboard.sub-categories.delete',['sub_category' => $sub_category->child->id]) }}">
                            <i class="feather_icon color_theme" data-feather="trash-2"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
