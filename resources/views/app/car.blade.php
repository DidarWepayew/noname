<div class="border rounded shadow-sm p-3">
    <div class="d-flex justify-content-between">
        <div>
            <div class="text-danger mb-1">
                <a href="{{ route('cars.index', ['brand' => $car->brand->id]) }}" class="link-danger text-decoration-none">
                    {{ $car->brand->name }}
                </a>
            </div>
            <div class="mb-1">
                <a href="{{ route('cars.index', ['color' => $car->color->id]) }}" class="link-dark text-decoration-none">
                    {{ $car->color->name }}
                </a>
                <a href="{{ route('cars.index', ['year' => [$car->year->id]]) }}" class="link-dark text-decoration-none">
                    ∙ {{ $car->year->name }}
                </a>
            </div>
        </div>
        <div class="text-end">
            @if($car->created_at >= \Carbon\Carbon::now()->subMonths(3)->toDateTimeString())
                <span class="badge bg-danger-subtle border border-danger-subtle text-danger-emphasis rounded-pill">
                    @lang('app.new')
                </span>
            @endif
            <button class="btn btn-light btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCar{{ $car->id }}" aria-expanded="false" aria-controls="collapseCar{{ $car->id }}">
                <i class="bi-caret-down-fill"></i>
            </button>
        </div>
    </div>
    <div id="collapseCar{{ $car->id }}" class="small text-secondary collapse">
        <a href="{{ route('cars.index', ['location' => $car->location->id]) }}" class="link-dark text-decoration-none">
            {{ $car->location->name }}
        </a>
        ∙ {{ $car->description }} ({{ $car->created_at }})
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <span class="text-primary">
                {{ round($car->price, 2) }} <small>TMT</small>
            </span>
            @if(!$car->active)
                <span class="badge bg-warning-subtle border border-warning-subtle text-warning-emphasis rounded-pill">
                    <i class="bi-clock-fill"></i> @lang('app.pending')
                </span>
            @endif
        </div>
        <div class="text-secondary">
            <i class="bi-eye-fill"></i> {{ $car->viewed }}
        </div>
    </div>
</div>