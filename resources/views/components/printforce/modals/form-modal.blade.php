<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog {{ $modalSize }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    {{ $modalTitle }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ $action }}">
            <div class="modal-body">
                @csrf

                @if ($formType === 'edit')
                    @method('patch')
                @endif

                <!-- Modal body content goes here -->
                {{ $slot }}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fi fi-sr-check me-3"></i>
                    {{ $btnLabel ?? 'Save' }}
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
