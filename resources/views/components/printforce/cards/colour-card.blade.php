<div class="card rounded-4 border-0">
    <div class="card-body px-3 pb-2">
        <div class="bg-{{ $bgColour }} bg-opacity-50 px-3 py-3 rounded-3 mb-3">
            <h4>{{ $title }}</h4>
            <p class="cal-sans fs-16px">{{ $value }}</p>
        </div>

        <a href="{{ $link }}" class="text-decoration-none d-flex">Explore
            <i class="fa fa-long-arrow-right ms-auto me-1"></i>
        </a>
    </div>
</div>
