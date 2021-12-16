@if(!empty($categories))
    <div class="filter-block">
        <h4>{{ $val['title'] }}</h4>
        <div class="form-group">
            <select class="chosen-select" name="category">
                <option value="">{{__("-- Please select category --")}}</option>
                @foreach($categories as $category)
                    @php
                        $translation = $category->translateOrOrigin(app()->getLocale());
                    @endphp
                    <option @if(Request::query('category') == $category->id) selected @endif value="{{ $category->id }}">{{$translation->name}}</option>
                @endforeach
            </select>
            <span class="icon flaticon-briefcase"></span>
        </div>
    </div>
@endif
