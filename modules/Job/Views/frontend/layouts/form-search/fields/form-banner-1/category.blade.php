@if($list_categories)
    <!-- Form Group -->
    <div class="form-group col-lg-3 col-md-12 col-sm-12 location">
        <span class="icon flaticon-briefcase"></span>
        <select class="chosen-select">
            <option value="">{{ __("All Categories") }}</option>
            @foreach($list_categories as $cat)
                @php
                    $translate = $cat->translateOrOrigin(app()->getLocale());
                @endphp
                <option value="{{ $cat->id }}" @if($cat->id == request()->get('category')) selected @endif  >{{ $translate->name }}</option>
            @endforeach
        </select>
    </div>
@endif
