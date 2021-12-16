<!-- Banner Section Three-->
<section class="banner-section-three">
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-lg-7 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="title-box wow fadeInUp">
                        <h3>{!! @clean($title) !!}</h3>
                        <div class="text">{{ $sub_title }}</div>
                    </div>

                    <!-- Job Search Form -->
                    <div class="job-search-form-two wow fadeInUp" data-wow-delay="500ms">
                        <form method="get" action="{{ route('job.search') }}">
                            <div class="row">
                                <div class="form-group col-lg-5 col-md-12 col-sm-12">
                                    <label class="title">{{ __("What") }}</label>
                                    <span class="icon flaticon-search-1"></span>
                                    <input type="text" name="s" placeholder="{{ __("Job title...") }}">
                                </div>
                                <!-- Form Group -->
                                <div class="form-group col-lg-4 col-md-12 col-sm-12 location">
                                    <label class="title">{{ __("Where") }}</label>
                                    <span class="icon flaticon-map-locator"></span>
                                    <select class="chosen-select" name="location">
                                        <option value="">{{ __("All City") }}</option>
                                        @foreach($list_locations as $location)
                                            @php
                                                $translate = $location->translateOrOrigin(app()->getLocale());
                                            @endphp
                                            <option value="{{ $location->id }}" >{{ $translate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Form Group -->
                                <div class="form-group col-lg-3 col-md-12 col-sm-12 btn-box">
                                    <button type="submit" class="theme-btn btn-style-one"><span class="btn-title">{{ __("Find Jobs") }}</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Job Search Form -->

                    @if(!empty($popular_searches))
                        <!-- Popular Search -->
                        <div class="popular-searches wow fadeInUp" data-wow-delay="1000ms">
                            <span class="title">{{ __("Popular Searches") }} : </span>
                            @foreach($popular_searches as $key => $val)
                                @if($key != 0), @endif
                                <a href="{{ route('job.search').'?s='.$val }}">{{ $val }}</a>
                            @endforeach
                        </div>
                        <!-- End Popular Search -->
                    @endif
                </div>
            </div>

            <div class="image-column col-lg-5 col-md-12">
                <div class="image-box">
                    @if(!empty($banner_image))
                        <figure class="main-image wow fadeInRight" data-wow-delay="1500ms">
                            <img src="{{ $banner_image_url }}" alt="image">
                        </figure>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section Three-->
