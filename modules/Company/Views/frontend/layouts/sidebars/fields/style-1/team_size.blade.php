<!-- Filter Block -->
@foreach ($attributes as $attribute)
    <div class="filter-block">
        <h4>{{ $val['title'] }}</h4>
        <div class="form-group">
            <select class="chosen-select" name="team_size">
                <option value="">{{__("-- Please select team size --")}}</option>
                @foreach($attribute->terms as $term)
                    <option @if($term->id == Request::query('team_size')) selected @endif value="{{$term->id}}">{{$term->name}}</option>
                @endforeach
            </select>
            <span class="icon flaticon-briefcase"></span>
        </div>
    </div>
@endforeach
