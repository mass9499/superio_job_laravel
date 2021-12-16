<aside class="sidebar">
    <div class="sidebar-widget company-widget">
        <div class="widget-content">
            <ul class="company-info mt-0">
                @if($row->category)
                    <li>{{__("Primary industry")}}: <span>{{ $row->category->name }}</span></li>
                @endif
                @if($row->teamSize)
                    <li>{{__("Company size")}}: <span>{{ $row->teamSize->name }}</span></li>
                @endif
                @if(!empty($row->founded_in))
                    <li>{{__("Founded in")}}: <span>{{ \Carbon\Carbon::parse($row->founded_in)->year }}</span></li>
                @endif
                @if(!empty($row->phone))
                    <li>{{__("Phone")}}: <span>{{ $row->phone }}</span></li>
                @endif
                @if(!empty($row->email))
                    <li>{{__("Email")}}: <span>{{ $row->email }}</span></li>
                @endif
                @if($row->location)
                        @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
                    <li>{{__("Location")}}: <span>{{ $location->name }}</span></li>
                @endif
                @php
                    $Social_media = !empty($row->social_media) ? $row->social_media : [];
                @endphp
                @if(isset($Social_media['facebook']) || isset($Social_media['instagram']) || isset($Social_media['twitter']) || isset($Social_media['linkedin']))
                    <li>{{__("Social media")}}:
                        <div class="social-links">
                            @if(!empty($Social_media['skype']))
                                <a href="{{ $Social_media['skype'] }}"><i class="fab fa-skype"></i></a>
                            @endif
                            @if(!empty($Social_media['facebook']))
                                <a href="{{ $Social_media['facebook'] }}"><i class="fab fa-facebook-f"></i></a>
                            @endif
                            @if(!empty($Social_media['twitter']))
                                <a href="{{ $Social_media['twitter'] }}"><i class="fab fa-twitter"></i></a>
                            @endif
                            @if(!empty($Social_media['instagram']))
                                <a href="{{ $Social_media['instagram'] }}"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if(!empty($Social_media['linkedin']))
                                <a href="{{ $Social_media['linkedin'] }}"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if(!empty($Social_media['google']))
                                    <a href="{{ $Social_media['google'] }}"><i class="fab fa-google"></i></a>
                            @endif
                        </div>
                    </li>
                @endif
            </ul>
            @if(!empty($row->website))
                <div class="btn-box"><a href="{{ $row->website }}" class="theme-btn btn-style-three">{{ $row->website }}</a></div>
            @endif
        </div>
    </div>
    @if(!empty($row->map_lat) && !empty($row->map_lng))
        <div class="sidebar-widget">
            <!-- Map Widget -->
            <h4 class="widget-title">{{__("Job Location")}}</h4>
            <div class="widget-content">
                <div class="map-outer mb-0">
                    <div class="map-canvas"
                         data-zoom="12"
                         data-lat="{{ $row->map_lat }}"
                         data-lng="{{ $row->map_lat }}"
                         data-type="roadmap"
                         data-hue="#ffc400"
                         data-title="Envato"
                         data-icon-path="images/resource/map-marker.png"
                         data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
                    </div>
                </div>
            </div>
        </div>
    @endif
</aside>
