<div class="modal fade" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered {{ isset($size) ? 'modal-' . $size : '' }}" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex justify-content-between mb-3">
                    <h6 class="modal-title" id="modal_title">{{ $title ?? '' }}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="content">
                    @if (isset($content))
                        {!! $content !!}
                    @else
                        @include('partials.common.sekeleton.form')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
