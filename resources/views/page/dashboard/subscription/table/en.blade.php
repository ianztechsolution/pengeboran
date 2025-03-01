<div class="table-responsive">
    <table class="table table-borderless table-hover table-transparent">
        <thead>
            <tr>
                <th style="width: 50px">No</th>
                <th>Hotel</th>
                <th>Title</th>
                <th>Status</th>
                <th style="width: 100px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscription as $item)
                <tr>
                    <td>{{ $loop->iteration + $subscription->firstItem() - 1 }}</td>
                    <td>{{ $item->settings->business_name ?? ''}}</td>
                    <td>{{ $item->title_en }}</td>
                    <td>
                        <span class="badge bg-{{ [
                            'active' => 'success',
                            'pending' => 'warning',
                            'inactive' => 'danger',
                        ][$item->status] }} w-50">
                            {{ ucwords($item->status) }}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Detail"
                                data-modal-title="Detail Subscription" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.subscription.show', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="eye"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Edit"
                                data-modal-title="Edit Subscription" data-modal-size="lg"
                                data-render-route="{{ route('dashboard.subscription.edit', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-light ajax_modal_btn" title="Hapus"
                                data-modal-title="Hapus Subscription"
                                data-render-route="{{ route('dashboard.subscription.delete', $item->id) }}">
                                <i class="feather_icon color_theme" data-feather="trash-2"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
          
        </tbody>
    </table>
</div>
