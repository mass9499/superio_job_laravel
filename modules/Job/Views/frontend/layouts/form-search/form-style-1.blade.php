<form method="get" action="{{ request()->fullUrl() }}" >
    @php
    $job_sidebar_search_fields = setting_item_array('job_sidebar_search_fields');
    $job_sidebar_search_fields = array_values(\Illuminate\Support\Arr::sort($job_sidebar_search_fields, function ($value) {
        return $value['position'] ?? 0;
    }));
    @endphp
    @if($job_sidebar_search_fields)
        @foreach($job_sidebar_search_fields as $key => $val)
            @php $val['title'] = $val['title_'.app()->getLocale()] ?? $val['title'] ?? "" @endphp
            @if(request()->get('_layout') == 'v2' && in_array($val['type'], ['location', 'keyword', 'category'])) @continue @endif
            @includeIf("Job::frontend.layouts.form-search.fields.form-style-1." . $val['type'])
        @endforeach
    @endif
    <div class="wrapper-submit flex-middle col-xs-12 col-md-12">
        <button type="submit" class="theme-btn btn-style-one bg-blue">{{ __("Find Jobs") }}</button>
    </div>
</form>
