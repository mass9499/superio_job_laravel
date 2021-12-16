<!--Page Title-->
<section class="page-title style-two">
    <div class="auto-container">
        <!-- Job Search Form -->
        <div class="job-search-form">
            @include("Job::frontend.layouts.form-search.form-banner-1")
        </div>
        <!-- Job Search Form -->
    </div>
</section>
<!--End Page Title-->

<!-- Listing Section -->
<section class="ls-section">
    <div class="auto-container">
        <div class="filters-backdrop"></div>

        <div class="row">

            <!-- Filters Column -->
            <div class="filters-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="filters-outer">
                        <button type="button" class="theme-btn close-filters">X</button>
                        @include("Job::frontend.layouts.form-search.form-style-1")
                    </div>
                    @php
                        $job_sidebar_cta = setting_item_with_lang('job_sidebar_cta',request()->query('lang'), $settings['job_sidebar_cta'] ?? false);
                        if(!empty($job_sidebar_cta)) $job_sidebar_cta = json_decode($job_sidebar_cta);
                    @endphp
                    @if(!empty($job_sidebar_cta->title))
                    <!-- Call To Action -->
                        <div class="call-to-action-four">
                            <h5>{{ $job_sidebar_cta->title ?? '' }}</h5>
                            <p>{{ $job_sidebar_cta->desc ?? '' }}</p>
                            @if(!empty($job_sidebar_cta->button->url))
                                <a href="{{ ($job_sidebar_cta->button->url) }}" target="{{ $job_sidebar_cta->button->target ?? "_self" }}" class="theme-btn btn-style-one bg-blue">
                                    <span class="btn-title">{{ $job_sidebar_cta->button->name ?? __("Start Recruiting Now") }}</span>
                                </a>
                            @endif
                            <div class="image" style="background-image: url({{ !empty($job_sidebar_cta->image) ? \Modules\Media\Helpers\FileHelper::url($job_sidebar_cta->image, 'full') : '' }});"></div>
                        </div>
                        <!-- End Call To Action -->
                    @endif
                </div>
            </div>

            <!-- Content Column -->
            <div class="content-column col-lg-8 col-md-12 col-sm-12">
                <div class="ls-outer">
                    <button type="button" class="theme-btn btn-style-two toggle-filters">{{ __("Show Filters") }}</button>

                    @if(!empty($rows) && count($rows) > 0)
                        <!-- ls Switcher -->
                        <div class="ls-switcher">
                            <div class="showing-result">
                                <div class="text">{{ __("Showing") }} <strong>{{ $rows->firstItem() }}-{{ $rows->lastItem() }}</strong> {{ __("of") }} <strong>{{ $rows->total() }}</strong> {{ __("jobs") }}</div>
                            </div>
                            <div class="sort-by">
                                <form class="bc-form-order" method="get">
                                    <select class="chosen-select" name="orderby" onchange="this.form.submit()">
                                        <option value="">{{__('Sort by (Default)')}}</option>
                                        <option value="new" @if(request()->get('orderby') == 'new') selected @endif>{{__('Newest')}}</option>
                                        <option value="old" @if(request()->get('orderby') == 'old') selected @endif>{{__('Oldest')}}</option>
                                        <option value="name_high" @if(request()->get('orderby') == 'name_high') selected @endif>{{__('Name [a->z]')}}</option>
                                        <option value="name_low" @if(request()->get('orderby') == 'name_low') selected @endif>{{__('Name [z->a]')}}</option>
                                    </select>

                                    <select class="chosen-select" name="limit" onchange="this.form.submit()">
                                        <option value="10" @if(request()->get('limit') == 10) selected @endif >{{ __("Show 10") }}</option>
                                        <option value="20" @if(request()->get('limit') == 20) selected @endif >{{ __("Show 20") }}</option>
                                        <option value="30" @if(request()->get('limit') == 30) selected @endif >{{ __("Show 30") }}</option>
                                        <option value="40" @if(request()->get('limit') == 40) selected @endif >{{ __("Show 40") }}</option>
                                        <option value="50" @if(request()->get('limit') == 50) selected @endif >{{ __("Show 50") }}</option>
                                        <option value="60" @if(request()->get('limit') == 60) selected @endif >{{ __("Show 60") }}</option>
                                    </select>
                                </form>
                            </div>
                        </div>

                        @foreach($rows as $row)
                            <div class="job-block">
                                @include("Job::frontend.layouts.loop.job-item-1")
                            </div>
                        @endforeach

                        <!-- Pagination -->
                        <nav class="ls-pagination">
                            {{$rows->appends(request()->query())->links()}}
                        </nav>

                    @else
                        <div class="job-results-not-found">
                            <h3>{{ __("No job results found") }}</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Listing Page Section -->
