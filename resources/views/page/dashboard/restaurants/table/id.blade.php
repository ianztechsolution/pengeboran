<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th style="width: 100px">Ikon</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th style="width: 100px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($restaurants as $restaurant)
            <tr>
                <td>{{ $loop->iteration + $restaurants->firstItem() - 1 }}</td>
                <td><img src="{{ $restaurant->image_icon }}" width="100px"/></td>
                <td>{{ $restaurant->name_id }}</td>
                <td>{{ $restaurant->short_description_id }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a type="button" class="btn btn-sm btn-light" title="Paket"
                            href="{{ route('dashboard.food-beverages.packages.index', ['packageble_id' => $restaurant->id ]) }}">
                            <i class="feather_icon color_theme" data-feather="shopping-bag"></i>
                        </a>

                        <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                            data-modal-title="Detail Restoran" data-modal-size="lg"
                            data-render-route="{{ route('dashboard.restaurants.show',$restaurant->id) }}">
                            <i class="feather_icon color_theme" data-feather="eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Ubah"
                            data-modal-title="Ubah Restoran" data-modal-size="lg"
                            data-render-route="{{ route('dashboard.restaurants.edit',$restaurant->id) }}">
                            <i class="feather_icon color_theme" data-feather="edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                            data-modal-title="Hapus Restoran"
                            data-render-route="{{ route('dashboard.restaurants.delete',$restaurant->id) }}">
                            <i class="feather_icon color_theme" data-feather="trash-2"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
