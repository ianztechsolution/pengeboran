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
                <th style="width: 100px" scope="col" class="sort cursor-pointer text-muted" data-sort="customer">Pelanggan</th>
                <th style="width: 150px" scope="col" class="sort cursor-pointer text-muted" data-sort="title">Judul</th>
                <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="date">Tanggal</th>
                <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="date">Metode Pembayaran</th>
                <th style="width: 30px" scope="col" class="sort cursor-pointer text-muted" data-sort="status">Status</th>
                <th style="width: 30px" scope="col" class="text-muted">Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            @foreach ($projects as $project)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td class="customer">
                        {{ $project->customer->name }}
                    </td>
                    <td class="title">
                        {{ $project->title }}
                    </td>
                    <td class="date">
                        {{ date('d/m/Y', strtotime($project->date)) }}
                    </td>
                    <td class="customer">
                        {{ $project->payment_channel->name }}
                    </td>
                    <td class="status">
                        <span class="badge bg-{{ $project->status === 'AKTIF' ? 'success' : 'danger' }}">
                            {{ str_replace('_', ' ', ucwords($project->status)) }}
                        </span>
                    </td>
                    <td class="d-flex align-items-center gap-3 justify-content-end">
                        <a href="{{ route('dashboard.transaction.projects.show', $project->id) }}" class="btn btn-sm btn-info">
                            <i class="bx bx-show"></i>
                        </a>
                        @if(auth()->user()->hasRole('technician') && auth()->user()->id == $project->technician_id && ($project->status != "DONE" || $project->status != 'CANCELED'))
                            <a href="{{ route('dashboard.transaction.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">
                                <i class="ri-edit-2-line"></i>
                            </a>
                        @endif
                        @if(((auth()->user()->hasRole('admin') && (($project->status != "DONE" ) || $project->status != "CANCELED"))) || (auth()->user()->hasRole('customer') && auth()->user()->id == $project->customer_id && $project->status == "REQUEST_APPROVAL"))
                            <a href="{{ route('dashboard.transaction.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">
                                <i class="ri-edit-2-line"></i>
                            </a>
                            <form action="{{ route('dashboard.transaction.projects.destroy', $project->id) }}" method="POST" style="display:inline;" data-after-submit="reload">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="ri-delete-bin-line"></i></button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody><!-- end tbody -->
    </table><!-- end table -->
</div>