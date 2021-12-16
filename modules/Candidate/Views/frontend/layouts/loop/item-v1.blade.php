<!-- Job Block -->
@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp
<div class="inner-box">
    <div class="content">

        <figure class="image"><img src="{{$row->user->getAvatarUrl()}}" alt="{{ $row->user->getDisplayName()}}"></figure>

        <h4 class="name"><a href="{{ $row->getDetailUrl() }}">{{ $row->user->getDisplayName() }}</a></h4>
        <ul class="candidate-info">
            @if($row->title)
                <li class="designation">{{$row->title}}</li>
            @endif
            @if($row->city || $row->country)
                <li><span class="icon flaticon-map-locator"></span> {{$row->city}}, {{$row->country}}</li>
            @endif
            @if($row->expected_salary)
                <li><span class="icon flaticon-money"></span> {{$row->expected_salary}} {{currency_symbol()}}  / {{$row->salary_type}}</li>
            @endif
        </ul>
        <ul class="post-tags">
            @if(!empty($row->categories))
                @foreach($row->categories as $oneCategory)
                    <li><a href="{{ route('candidate.index', ['category' => $oneCategory->id]) }}">{{$oneCategory->name}}</a></li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="btn-box">
        <button class="bookmark-btn service-wishlist @if($row->wishlist) active @endif" data-id="{{$row->id}}" data-type="{{$row->type}}"><span class="flaticon-bookmark"></span></button>
        <a href="{{ $row->getDetailUrl() }}" class="theme-btn btn-style-three"><span class="btn-title">{{__('View Profile')}}</span></a>
    </div>
</div>
