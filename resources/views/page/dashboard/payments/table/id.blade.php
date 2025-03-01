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
                <th scope="col" class="sort cursor-pointer text-muted" data-sort="projects">Proyek</th>
                <th scope="col" class="sort cursor-pointer text-muted" data-sort="customers">Pelanggan</th>
                <th scope="col" class="sort cursor-pointer text-muted" data-sort="invoice_no">Nomor Invoice</th>
                <th scope="col" class="sort cursor-pointer text-muted" data-sort="total_payment">Total Bayar</th>
                <th scope="col" class="sort cursor-pointer text-muted" data-sort="status">Status</th>
                <th style="width: 30px" scope="col" class="text-muted">Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            @foreach ($payments as $payment)
                <tr>
                    <td>
                        {{ $loop->iteration }}
                    </td>
                    <td class="project">
                        {{ $payment->project->title }}
                    </td>
                    <td class="customer">
                        {{ $payment->customer->name }}
                    </td>
                    <td class="invoice_no">
                        {{ $payment->invoice->invoice_no }}
                    </td>
                    <td class="total_payment">
                        {{ \App\Helper\Helper::currencyFormatting($payment->total_payment, 'Rp. ') }}
                    </td>
                    <td class="status">
                        <span class="badge bg-{{ $payment->status === 'PAID' ? 'success' : 'danger' }}">
                            {{ str_replace('_', ' ', ucwords($payment->status)) }}
                        </span>
                    </td>
                    <td class="d-flex align-items-center gap-3 justify-content-end">
                        <a href="{{ route('dashboard.transaction.payments.show', $payment->id) }}" class="btn btn-sm btn-info">
                            <i class="bx bx-show"></i>
                        </a>
                        @if((auth()->user()->hasRole('admin')) || (auth()->user()->hasRole('customer') && $payment->status != 'PAID'))
                            <a href="{{ route('dashboard.transaction.payments.edit', $payment->id) }}" class="btn btn-sm btn-warning">
                                <i class="ri-edit-2-line"></i>
                            </a>
                        @endif
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