<div class="btn-box">
    @switch($row->apply_type)
        @case('email')
        <a href="mailto:{{ $row->apply_email ?? ($row->company->email ?? '') }}" target="_blank" rel="nofollow" class="theme-btn btn-style-one">{{ __("Apply For Job") }}</a>
        @break
        @case('external')
        <a href="{{ $row->apply_link }}" target="_blank" rel="nofollow" class="theme-btn btn-style-one">{{ __("Apply For Job") }}</a>
        @break
        @default
        @if($row->isOpen())
            @if(!auth()->check())
                <a href="#" class="theme-btn btn-style-one bc-call-modal login">{{ __("Apply For Job") }}</a>
            @else
                @if($applied)
                    <a href="javascript:void(0)" class="theme-btn btn-style-one bc-apply-job-button">{{ __("Applied") }}</a>
                @else
                    <a href="#" data-require-text="{{ __('Please login as "Candidate" to apply') }}" class="theme-btn btn-style-one bc-apply-job-button @if(!is_candidate() || empty($candidate)) bc-require-candidate-apply @else bc-call-modal apply-job @endif">{{ __("Apply For Job") }}</a>
                @endif
                @include('Job::frontend.layouts.details.apply-job-popup')
            @endif
        @else
            <div class="text-danger job-expired">{{ __("Job expired!") }}</div>
        @endif
        @break
    @endswitch
    <button class="bookmark-btn service-wishlist @if($row->wishlist) active @endif" data-id="{{$row->id}}" data-type="{{$row->type}}"><i class="flaticon-bookmark"></i></button>
</div>
