<!-- Job Block -->
<div class="job-block">
    <div class="inner-box">
        <div class="content">
            <span class="company-logo">
                @if($company_logo = $job->getThumbnailUrl())
                    <img src="{{ $company_logo }}" alt="{{ $job->company ? $job->company->name : 'company' }}">
                @endif
            </span>
            <h4><a href="{{ $job->getDetailUrl() }}">{{ $job->title }}</a></h4>
            <ul class="job-info">
                @php $category = $job->category; @endphp
                @if(!empty($category))
                    @php $t = $category->translateOrOrigin(app()->getLocale()); @endphp
                    <li><span class="icon flaticon-briefcase"></span> {{ $t->name }}</li>
                @endif
                @php $location = $job->category; @endphp
                @if(!empty($location))
                    @php $l = $location->translateOrOrigin(app()->getLocale()); @endphp
                    <li><span class="icon flaticon-map-locator"></span> {{ $l->name }}</li>
                @endif
                @if($job->created_at)
                    <li><span class="icon flaticon-clock-3"></span>{{ $job->timeAgo() }}</li>
                @endif
                @if($job->salary_min && $job->salary_max)
                    <li><span class="icon flaticon-money"></span>{{ $job->getSalary() }}</li>
                @endif
            </ul>
            <ul class="job-other-info">
                @if($job->jobType)
                    <li class="time">{{ $job->jobType->name }}</li>
                @endif
                @if($job->is_featured)
                        <li class="privacy">{{ __("Featured") }}</li>
                @endif
                @if($job->is_urgent)
                    <li class="required">Urgent</li>
                @endif
            </ul>
            <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
        </div>
    </div>
</div>
