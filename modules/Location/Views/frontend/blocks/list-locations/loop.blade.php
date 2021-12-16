@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp
<!-- Feature Block -->
<div class="feature-block">
    <div class="inner-box">
        <figure class="image">
            <img src="{{ $row->getImageUrl() }}" alt="{{ $row->name }}">
        </figure>
        <div class="overlay-box">
            <div class="content">
                <h5>{{ $translation->name }}</h5>
                <span class="total-jobs">{{ $row->getOpenJobsCount() }} {{ $row->getOpenJobsCount() == 1 ? __("Job") : __("Jobs") }}</span>
                <a href="{{ route("job.search", ['location_id' => $row->id]) }}" class="overlay-link"></a>
            </div>
        </div>
    </div>
</div>
