@if($category->types)
    <div class="category-types">
        <h2 class="category-page-title mb-4">{{__('Explore :name',['name'=>$category->name])}}</h2>
        <div class="row">
            @foreach($category->types as $category_type)
                <div class="col-md-4 mb-5">
                    <div class="c-type-item h-100">
                        @if($category_type->image_id)
                            <div class="bg-cover div-16-9 border-radius-8 mb-3" style="background-image: url('{{get_file_url($category_type->image_id,'full')}}')"></div>
                        @endif
                        <h3 class="c-type-name fw-500 fs-18 mb-3">{{$category_type->name}}</h3>
                        <ul class="list-unstyled c-type-children">
                            @foreach($category_type->children() as $child_cat)
                                <li class="mb-2"><a class="d-block c-62646a" href="{{$child_cat->getDetailUrl()}}">{{$child_cat->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
