<div class="offcanvas {{ isset($position) ? 'offcanvas-' . $position : '' }}" tabindex="-1" id="{{ $id }}"
    aria-labelledby="offcanvas_title">
    <div class="offcanvas-header">
        <h6 class="offcanvas-title" id="offcanvas_title">{{ $title ?? '' }}</h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">{{ $content ?? '' }}</div>
</div>
