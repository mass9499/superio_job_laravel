<!-- Filter Block -->
@if($list_locations)
    <div class="filter-block">
        <h4>{{ $val['title'] }}</h4>
        <div class="form-group bc-select-has-delete">
            <select class="chosen-select" name="location">
                <option value="">{{ __("Choose a location") }}</option>
                @foreach($list_locations as $location)
                    @php
                        $translate = $location->translateOrOrigin(app()->getLocale());
                    @endphp
                <option value="{{ $location->id }}" @if($location->id == request()->get('location')) selected @endif  >{{ $translate->name }}</option>
                @endforeach
            </select>
            <span class="icon flaticon-map-locator"></span>
        </div>
    </div>
@endif
