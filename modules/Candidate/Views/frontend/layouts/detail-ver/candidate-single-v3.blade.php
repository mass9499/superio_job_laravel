<div class="bravo-candidates">
@php
    $title_page = setting_item_with_lang("candidate_page_list_title");
    if(!empty($custom_title_page)){
        $title_page = $custom_title_page;
    }
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp

<!-- Candidate Detail Section -->
    <section class="candidate-detail-section style-three">
        <div class="upper-box">
            <div class="auto-container">
                <!-- Candidate block Six -->
                <div class="candidate-block-six">
                    <div class="inner-box">
                        <figure class="image"><img src="{{$row->user->getAvatarUrl()}}" alt=""></figure>
                        <h4 class="name"><a href="#">{{$row->user->getDisplayName()}}</a></h4>
                        <span class="designation">{{$row->title}}</span>
                        <div class="content">
                            @php
                                $categories = $row->getCategory();
                            @endphp
                            <ul class="post-tags">
                                @if(!empty($row->categories))
                                    @foreach($row->categories as $oneCategory)
                                        <li><a target="_blank" href="{{ route('candidate.index', ['category' => $oneCategory->id]) }}">{{$oneCategory->name}}</a></li>
                                    @endforeach
                                @endif
                            </ul>

                            <ul class="candidate-info">
                                @if($row->city || $row->country)
                                    <li><span class="icon flaticon-map-locator"></span> {{$row->city}}, {{$row->country}}</li>
                                @endif
                                @if($row->expected_salary)
                                    <li><span class="icon flaticon-money"></span> {{$row->expected_salary}} {{currency_symbol()}}  / {{$row->salary_type}}</li>
                                @endif
                                <li><span class="icon flaticon-clock"></span> {{__('Member Since')}} {{date('M d, Y', strtotime($row->user->created_at))}}</li>
                            </ul>

                            <div class="btn-box">
                                @php
                                    $url = '';
                                    if(!empty($cv)){
                                        $file = (new \Modules\Media\Models\MediaFile())->findById($cv->file_id);
                                        $url  = asset('uploads/'.$file['file_path']);
                                    }
                                @endphp
                                @if($url)
                                    <a href="{{$url}}" class="theme-btn btn-style-one">{{__('Download CV')}}</a>
                                @endif
                                <button class="bookmark-btn @if($row->wishlist) active @endif service-wishlist" data-id="{{$row->id}}" data-type="{{$row->type}}"><span class="flaticon-bookmark"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="candidate-detail-outer">
            <div class="auto-container">
                <div class="row">
                    @include('Candidate::frontend.layouts.details.candidate-sidebar')

                    @include('Candidate::frontend.layouts.details.candidate-detail')
                </div>
            </div>
        </div>
    </section>
    <!-- End candidate Detail Section -->
</div>
