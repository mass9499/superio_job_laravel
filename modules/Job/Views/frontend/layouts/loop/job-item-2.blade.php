<!-- Job Block-two -->
@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp
<div class="inner-box">
    <div class="content">
        @if($company_logo = $row->getThumbnailUrl())
            <span class="company-logo">
                <img src="{{ $company_logo }}" alt="{{ $row->company ? $row->company->name : 'company' }}">
            </span>
        @endif
        <h4><a href="{{ $row->getDetailUrl() }}">{{ $translation->title }}</a></h4>
        <ul class="job-info">
            @if($row->category)
                <li><span class="icon flaticon-briefcase"></span> {{ $row->category->name }}</li>
            @endif
            @if($row->location)
                <li><span class="icon flaticon-map-locator"></span> {{ $row->location->name }}</li>
            @endif
            @if($row->created_at)
                <li><span class="icon flaticon-clock-3"></span> {{ $row->timeAgo() }}</li>
            @endif
            @if($row->salary_min && $row->salary_max)
                <li><span class="icon flaticon-money"></span> {{ $row->getSalary(false) }}</li>
            @endif
        </ul>
    </div>
    <ul class="job-other-info">
        @if($row->is_featured)
            <li class="privacy">{{ __("Featured") }}</li>
        @endif
        @if($row->is_urgent)
            <li class="required">{{ __("Urgent") }}</li>
        @endif
        @if($row->jobType)
            <li class="time">{{ $row->jobType->name }}</li>
        @endif
    </ul>
    <button class="bookmark-btn @if($row->wishlist) active @endif service-wishlist" data-id="{{$row->id}}" data-type="{{$row->type}}"><span class="flaticon-bookmark"></span></button>
</div>
