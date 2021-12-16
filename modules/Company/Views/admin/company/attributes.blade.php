@foreach ($attributes as $attribute)
    <div class="panel">
        <div class="panel-title"><strong>{{__('Attribute: :name',['name'=>$attribute->name])}}</strong></div>
        <div class="panel-body">
            <div class="terms-scrollable">
                @foreach($attribute->terms as $term)
                    <label class="term-item"><input @if($term->id == $row->team_size) checked @endif type="radio" name="team_size" value="{{$term->id}}"> {{$term->name}}
                    </label>
                @endforeach
            </div>
        </div>
    </div>
@endforeach
