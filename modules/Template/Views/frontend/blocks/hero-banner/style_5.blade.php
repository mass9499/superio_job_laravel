<section class="banner-section-five">
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-lg-7 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInUp"  data-wow-delay="500ms">
                    <div class="title-box">
                        <h3>{!! @clean($title) !!}</h3>
                        <div class="text">{{ $sub_title }}</div>
                    </div>

                    <!-- Job Search Form -->
                    <div class="job-search-form">
                        <form method="get" action="{{ route('job.search') }}">
                            <div class="row">
                                <div class="form-group col-lg-5 col-md-12 col-sm-12">
                                    <span class="icon flaticon-search-1"></span>
                                    <input type="text" name="s" placeholder="{{ __("Job title...") }}">
                                </div>
                                <!-- Form Group -->
                                <div class="form-group col-lg-4 col-md-12 col-sm-12 location">
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
                                    <button type="submit" class="theme-btn btn-style-seven"><span class="btn-title">{{ __("Find Jobs") }}</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Job Search Form -->
                </div>
            </div>

            <div class="image-column col-lg-5 col-md-12">
                <div class="image-box">
                    <div class="row">
                        @if(!empty($banner_image))
                            <div class="column col-lg-6 col-md-6 col-sm-12 wow fadeInLeft" data-wow-delay="1500ms">
                                <figure class="image anm" data-speed-x="2"><img src="{{ get_file_url($banner_image,'full') }}" alt=""></figure>
                            </div>
                        @endif
                        <div class="column col-lg-6 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay="2000ms">
                            @if(!empty($style_5_banner_image_2))
                                <figure class="image anm" data-speed-x="2"><img src="{{ get_file_url($style_5_banner_image_2,'full') }}" alt=""></figure>
                            @endif
                            @if(!empty($style_5_banner_image_3))
                                <figure class="image anm" data-speed-x="2"><img src="{{ get_file_url($style_5_banner_image_3,'full') }}" alt=""></figure>
                            @endif
                        </div>
                    </div>

                    @if(!empty($style_5_list_images))
                        @foreach($style_5_list_images as $key => $val)
                            @if($key == 0 && !empty($val['image_id']))
                                <div class="info_block wow fadeIn anm" data-wow-delay="2500ms" data-speed-x="2" data-speed-y="2">
                                    @if(!empty($val['url'])) <a href="{{ $val['url'] }}"> @endif
                                        <img src="{{ \Modules\Media\Helpers\FileHelper::url($val['image_id'], 'full') }}" alt="">
                                        @if(!empty($val['url'])) </a> @endif
                                </div>
                            @endif
                            @if($key == 1 && !empty($val['image_id']))
                                <div class="info_block_two anm wow fadeIn" data-wow-delay="2000ms" data-speed-x="1" data-speed-y="1">
                                    @if(!empty($val['url'])) <a href="{{ $val['url'] }}"> @endif
                                        <img src="{{ \Modules\Media\Helpers\FileHelper::url($val['image_id'], 'full') }}" alt="">
                                        @if(!empty($val['url'])) </a> @endif
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
