<!-- Filter Block -->
@if($list_categories)
    <div class="filter-block">
        <h4>{{ $val['title'] }}</h4>
        <div class="form-group">

            <select class="chosen-select" name="category">
                <option>{{ __("Choose a category") }}</option>
                @foreach($list_categories as $cat)
                    @php
                        $translate = $cat->translateOrOrigin(app()->getLocale());
                    @endphp
                    <option value="{{ $cat->id }}" @if($cat->id == request()->get('category')) selected @endif  >{{ $translate->name }}</option>
                @endforeach
            </select>
            <span class="icon flaticon-briefcase"></span>
        </div>
    </div>
@endif
