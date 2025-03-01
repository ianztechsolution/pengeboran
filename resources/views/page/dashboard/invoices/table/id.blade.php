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
    <table id="service-types-datatables" class="display table dt-responsive table-borderless table-centered align-middle table-nowrap mb-0">
        <thead class="bg-light bg-opacity-50">
            <tr>
                <th scope="col" class="sort cursor-pointer text-muted" data-sort="id">#</th>
                <th scope="col" class="sort cursor-pointer text-muted" data-sort="name">Nama Proyek</th>
                <th scope="col" class="sort cursor-pointer text-muted" data-sort="name">Pelanggan</th>
                <th scope="col" class="sort cursor-pointer text-muted" data-sort="invoice_no">Nomor Tagihan</th>
                <th scope="col" class="sort cursor-pointer text-muted" data-sort="grand_total">Total Tagihan</th>
                <th scope="col" class="sort cursor-pointer text-muted" data-sort="status">Status</th>
                <th style="width: 30px" scope="col" class="text-muted">Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            @foreach ($invoices as $invoice)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td class="name">
                        {{ $invoice->project->title }}
                    </td>
                    <td class="customer_name">
                        {{ $invoice->customer->name }}
                    </td>
                    <td class="invoice_no">
                        {{ $invoice->invoice_no }}
                    </td>
                    <td class="grand_total">
                        {{ \App\Helper\Helper::currencyFormatting($invoice->grand_total, 'Rp. ') }}
                    </td>
                    <td class="status">
                        <span class="badge bg-{{ $invoice->status === 'PAID' ? 'success' : 'danger' }}">
                            {{ str_replace('_', ' ', ucwords($invoice->status)) }}
                        </span>
                    </td>
                    <td class="d-flex align-items-center gap-3 justify-content-end">
                        <a href="{{ route('dashboard.transaction.invoices.show', $invoice->id) }}" class="btn btn-sm btn-info">
                            <i class="bx bx-show"></i>
                        </a>
                        <a href="{{ route('dashboard.transaction.invoices.edit', $invoice->id) }}" class="btn btn-sm btn-warning">
                            <i class="ri-edit-2-line"></i>
                        </a>
                        <form action="{{ route('dashboard.transaction.invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;" data-after-submit="reload">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="ri-delete-bin-line"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody><!-- end tbody -->
    </table><!-- end table -->
</div>