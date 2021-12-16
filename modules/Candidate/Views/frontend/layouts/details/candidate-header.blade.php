<div class="upper-box">
    <div class="auto-container">
        <!-- Candidate block Five -->
        <div class="candidate-block-five">
            <div class="inner-box">
                <div class="content">
                    <figure class="image"><img src="{{$row->user->getAvatarUrl()}}" alt=""></figure>
                    <h4 class="name"><a href="#">{{$row->user->getDisplayName()}}</a></h4>
                    <ul class="candidate-info">
                        <li class="designation">{{$row->title}}</li>
                        @if($row->city || $row->country)
                            <li><span class="icon flaticon-map-locator"></span> {{$row->city}}, {{$row->country}}</li>
                        @endif
                        @if($row->expected_salary)
                            <li><span class="icon flaticon-money"></span> {{$row->expected_salary}} {{currency_symbol()}}  / {{$row->salary_type}}</li>
                        @endif
                        @if($row->user->created_at)
                            <li><span class="icon flaticon-clock"></span> {{__('Member Since')}} {{date('M d, Y', strtotime($row->user->created_at))}}</li>
                        @endif
                    </ul>
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
                </div>

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
