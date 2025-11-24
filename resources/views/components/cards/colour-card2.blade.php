<div class="card {{ $colour }}-gradient">
    <div class="card-body text-center px-9 pb-4">
        <div
            class="d-flex align-items-center justify-content-center round-48 rounded text-bg-{{ $colour }} flex-shrink-0 mb-3 mx-auto">
            <i class="fi fi-sr-{{ $icon }} fs-7 text-white"></i>
        </div>
        <h6 class="fw-normal fs-3 mb-1">{{ $title }}</h6>
        <h4 class="mb-3 d-flex align-items-center justify-content-center gap-1">
            {{ $value }}</h4>
        <a href="javascript:void(0)" class="btn btn-white fs-2 fw-semibold text-nowrap">View
            Details</a>
    </div>
</div>
