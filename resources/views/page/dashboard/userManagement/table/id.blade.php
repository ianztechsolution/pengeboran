<div class="table-responsive">
    @if (session()->has('success'))
        <button id="success-toast-btn" type="button" data-toast="" data-toast-text="{{ session()->get('success') }}" data-toast-gravity="top" data-toast-position="right" data-toast-duration="3000" data-toast-close="close" class="btn btn-light w-xs" style="display: none;">Top Right</button>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('success-toast-btn').click();
            });
        </script>
    @endif

    @if (session()->has('error'))
        <button id="error-toast-btn" type="button" data-toast="" data-toast-text="{{ session()->get('error') }}" data-toast-classname="danger" data-toast-gravity="top" data-toast-position="right" data-toast-duration="3000" data-toast-close="close" class="btn btn-light w-xs" style="display: none;">Top Right</button>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('error-toast-btn').click();
            });
        </script>
    @endif
    <table id="payment-channels-datatables" class="display table dt-responsive table-borderless table-centered align-middle table-nowrap mb-0">
        <thead class="bg-light bg-opacity-50">
            <tr>
                <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="id">#</th>
                <th style="width: 100px" scope="col" class="sort cursor-pointer text-muted" data-sort="customer">Nama</th>
                <th style="width: 150px" scope="col" class="sort cursor-pointer text-muted" data-sort="title">E-mail</th>
                <th style="width: 30px" scope="col" class="text-muted">Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td class="name">
                        {{ $user->name }}
                    </td>
                    <td class="email">
                        {{ $user->email }}
                    </td>
                    <td class="d-flex align-items-center gap-3 justify-content-end">
                        <a href="{{ route('dashboard.transaction.users.show', ['user' => $user->id, 'role' => $role]) }}" class="btn btn-sm btn-info">
                            <i class="bx bx-show"></i>
                        </a>
                        <a href="{{ route('dashboard.transaction.users.edit', ['user' => $user->id, 'role' => $role]) }}" class="btn btn-sm btn-warning">
                            <i class="ri-edit-2-line"></i>
                        </a>
                        <form action="{{ route('dashboard.transaction.users.destroy', $user->id) }}" method="POST" style="display:inline;" data-after-submit="reload">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="ri-delete-bin-line"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody><!-- end tbody -->
    </table><!-- end table -->
    <div class="noresult" style="display: none;">
        <div class="text-center">
            <h5 class="mt-2">Maaf! Data tidak ditemukan</h5>
        </div>
    </div>
</div>