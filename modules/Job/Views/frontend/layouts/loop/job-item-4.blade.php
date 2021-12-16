@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp
<div class="inner-box">
    <ul class="job-other-info">
        @if($row->jobType)
            <li class="time">{{ $row->jobType->name }}</li>
        @endif
        @if($row->is_featured)
            <li class="privacy">{{ __("Featured") }}</li>
        @endif
        @if($row->is_urgent)
            <li class="required">{{ __("Urgent") }}</li>
        @endif
    </ul>
    @if($company_logo = $row->getThumbnailUrl())
        <span class="company-logo">
            <img src="{{ $company_logo }}" alt="{{ $row->company ? $row->company->name : 'company' }}" class="full-width object-cover">
        </span>
    @endif
    @if($row->category)
        <span class="company-name">{{ $row->category->name }}</span>
    @endif
    <h4><a href="{{ $row->getDetailUrl() }}">{{ $translation->title }}</a></h4>
    @if($row->location)
        <div class="location"><span class="icon flaticon-map-locator"></span> {{ $row->location->name }}</div>
    @endif
</div>
