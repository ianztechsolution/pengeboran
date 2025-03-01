<div class="col-xxl-12">
    <div class="row">
        <div class="col-xxl-7">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar-sm">
                                <div class="avatar-title fs-4xl bg-info-subtle text-info rounded">
                                    <i class="bx bx-network-chart"></i>
                                </div>
                            </div>

                            <h4 class="mt-3">
                                <div>{{ count($projects) }}</div>
                            </h4>
                            <p class="mb-0 text-muted">Total Proyek</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar-sm">
                                <div class="avatar-title fs-4xl bg-primary-subtle text-primary rounded">
                                    <i class="bx bx-file"></i>
                                </div>
                            </div>

                            <h4 class="mt-3">
                                <div>{{ count($invoices) }}</div>
                            </h4>
                            <p class="mb-0 text-muted">Total Tagihan</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar-sm">
                                <div class="avatar-title fs-4xl bg-warning-subtle text-warning rounded">
                                    <i class="bx bx-user"></i>
                                </div>
                            </div>

                            <h4 class="mt-3">
                                <div>{{ count($customers) }}</div>
                            </h4>
                            <p class="mb-0 text-muted">Total Pelanggan</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar-sm">
                                <div class="avatar-title fs-4xl bg-danger-subtle text-danger rounded">
                                    <i class="bx bx-money"></i>
                                </div>
                            </div>

                            <h4 class="mt-3">
                                <div>{{ \App\Helper\Helper::currencyFormatting($totalPayment, 'Rp. ') }}</div>
                            </h4>
                            <p class="mb-0 text-muted">Total Pendapatan</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar-sm">
                                <div class="avatar-title fs-4xl bg-secondary-subtle text-secondary rounded">
                                    <i class="bx bx-redo"></i>
                                </div>
                            </div>

                            <h4 class="mt-3">
                                <div>{{ count($projectWaitingApproval) }}</div>
                            </h4>
                            <p class="mb-0 text-muted">Menunggu Persetujuan</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar-sm">
                                <div class="avatar-title fs-4xl bg-success-subtle text-success rounded">
                                    <i class="bx bx-stats"></i>
                                </div>
                            </div>

                            <h4 class="mt-3">
                                <div>{{ count($projectSchedule) }}</div>
                            </h4>
                            <p class="mb-0 text-muted">Penjadwalan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-12">
            <div class="card" id="patientsList">
                <div class="card-header align-items-center d-flex">
                    <h6 class="card-title mb-0 flex-grow-1">Proyek Baru-Baru Ini</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="payment-channels-datatables" class="display table dt-responsive table-borderless table-centered align-middle table-nowrap mb-0 mt-4">
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
                                        <span class="badge bg-{{ $project->status === 'DONE' ? 'success' : 'danger' }}">
                                            {{ str_replace('_', ' ', ucwords($project->status)) }}
                                        </span>
                                    </td>
                                    <td class="d-flex align-items-center gap-3 justify-content-end">
                                        <a href="{{ route('dashboard.transaction.projects.show', $project->id) }}" class="btn btn-sm btn-info">
                                            <i class="bx bx-show"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>