@if(!empty($categories))
<div class="form-group col-lg-3 col-md-12 col-sm-12 location">
    <span class="icon flaticon-briefcase"></span>
    <select class="chosen-select" name="category">
        <option value="">{{__("All Categories")}}</option>
        @foreach($categories as $category)
            @php
                $translation = $category->translateOrOrigin(app()->getLocale());
            @endphp
            <option @if(Request::query('category') == $category->id) selected @endif value="{{ $category->id }}">{{$translation->name}}</option>
        @endforeach
    </select>
</div>
@endif
