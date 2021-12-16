@if($list_locations)
    <!-- Form Group -->
    <div class="form-group col-lg-3 col-md-12 col-sm-12 location bc-select-has-delete">
        <span class="icon flaticon-map-locator"></span>
        <select class="chosen-select">
            <option value="">{{ __("All Locations") }}</option>
            @foreach($list_locations as $location)
                @php
                    $translate = $location->translateOrOrigin(app()->getLocale());
                @endphp
                <option value="{{ $location->id }}" @if($location->id == request()->get('location')) selected @endif  >{{ $translate->name }}</option>
            @endforeach
        </select>
    </div>
@endif
