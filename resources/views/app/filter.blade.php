<form action="{{ url()->current() }}">
    <div class="mb-3">
        <label for="brand" class="form-label fw-semibold">@lang('app.brand')</label>
        <select class="form-select form-select-sm" name="brand" id="brand">
            <option value="0">@lang('app.all')</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" {{ $brand->id == $f_brand ? 'selected' : '' }}>{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="location" class="form-label fw-semibold">@lang('app.location')</label>
        <select class="form-select form-select-sm" name="location" id="location">
            <option value="0">@lang('app.all')</option>
            @foreach($locations as $location)
                <option value="{{ $location->id }}" {{ $location->id == $f_location ? 'selected' : '' }}>{{ $location->getName() }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="year" class="form-label fw-semibold">@lang('app.year')</label>
        <select class="form-select form-select-sm" name="year[]" id="year" multiple>
            @foreach($years as $year)
                <option value="{{ $year->id }}" {{ in_array($year->id, $f_year) ? 'selected' : '' }}>{{ $year->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="color" class="form-label fw-semibold">@lang('app.color')</label>
        <select class="form-select form-select-sm" name="color" id="color">
            <option value="0">@lang('app.all')</option>
            @foreach($colors as $color)
                <option value="{{ $color->id }}" {{ $color->id == $f_color ? 'selected' : '' }}>{{ $color->getName() }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="sort" class="form-label fw-semibold">@lang('app.sort')</label>
        <select class="form-select form-select-sm" name="sort" id="sort">
            <option value="new-to-old" {{ 'new-to-old' == $f_sort ? 'selected' : '' }}>@lang('app.newToOld')</option>
            <option value="old-to-new" {{ 'old-to-new' == $f_sort ? 'selected' : '' }}>@lang('app.oldToNew')</option>
            <option value="low-to-high" {{ 'low-to-high' == $f_sort ? 'selected' : '' }}>@lang('app.lowToHigh')</option>
            <option value="high-to-low" {{ 'high-to-low' == $f_sort ? 'selected' : '' }}>@lang('app.highToLow')</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="perPage" class="form-label fw-semibold">@lang('app.perPage')</label>
        <select class="form-select form-select-sm" name="perPage" id="perPage">
            @foreach([15, 30, 60, 120] as $perPage)
                <option value="{{ $perPage }}" {{ $perPage == $f_perPage ? 'selected' : '' }}>{{ $perPage }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="active" name="active" value="0" {{ $f_active == 0 ? 'checked' : '' }}>
            <label class="form-check-label" for="active">@lang('app.pending')</label>
        </div>
    </div>
    <div class="row g-3">
        <div class="col">
            <a href="{{ url()->current() }}" class="btn btn-secondary btn-sm w-100">
                @lang('app.clear')
            </a>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-danger btn-sm w-100">
                <i class="bi-funnel"></i> @lang('app.filter')
            </button>
        </div>
    </div>
</form>