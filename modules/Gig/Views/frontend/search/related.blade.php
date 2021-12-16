<?php
if(!$category->children) return;
?>
    <div class="category-faqs pt-5 pb-5">
        <h2 class="category-page-title text-center mb-5 mt-4">{{__('Services Related To :name',['name'=>$category->name])}}</h2>
        <div class="category-tag-lists mt-3 d-flex justify-content-center" id="accordionExample">
            @foreach($category->children as $cat)
                <a class="cat-faq-item" href="{{$cat->getDetailUrl()}}">{{$cat->name}}</a>
            @endforeach
        </div>
    </div>
