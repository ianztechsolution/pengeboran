<div class="modal-body text-center">
    <h5 class="mb-4">Are you sure you want to delete this activity categories?</h5>

    <div class="d-flex justify-content-center gap-3">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">No</button>
        <form class="ajax_form" action="{{ route('dashboard.activities.destroy', $activity->id) }}" method="POST" style="display:inline;" data-after-submit="reload">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Yes, Delete</button>
        </form>
    </div>
</div>
