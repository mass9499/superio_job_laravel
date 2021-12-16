<div class="sec-title text-center">
    <h2>{{__("Pricing Packages")}}</h2>
    <div class="text">{{__("Choose your pricing plan")}}</div>
</div>
<div class="pricing-tabs tabs-box">
    <div class="tab-buttons">
        <h4>{{__('Save up to 10%')}}</h4>
        <ul class="tab-btns">
            <li data-tab="#monthly" class="tab-btn active-btn">{{__('Monthly')}}</li>
            <li data-tab="#annual" class="tab-btn">{{__('Annual')}}</li>
        </ul>
    </div>
    <div class="tabs-content">
        <div class="tab active-tab" id="monthly">
            <div class="content">
                <div class="row">
                    @foreach($plans as $plan)
                        <div class="pricing-table col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                @if($plan->is_recommended)
                                    <span class="tag">{{__('Recommended')}}</span>
                                @endif
                                <div class="title">{{$plan->title}}</div>
                                <div class="price">{{$plan->price ? format_money($plan->price) : __('Free')}}
                                    @if($plan->price)
                                    <span class="duration">/ {{$plan->duration > 1 ? $plan->duration : ''}} {{$plan->duration_type_text}}</span>
                                    @endif
                                </div>
                                <div class="table-content">
                                    {!! clean($plan->content) !!}
                                </div>
                                <div class="table-footer">
                                    @if($user and $user_plan = $user->user_plan and $user_plan->plan_id == $plan->id)
                                        @if($user_plan->is_valid)
                                            <a href="#" class="theme-btn btn-style-one">{{__("Current Plan")}}</a>
                                        @else
                                            <a href="{{route('user.plan.buy',['id'=>$plan->id])}}" class="theme-btn btn-style-two">{{__('Renew')}}</a>
                                        @endif
                                    @else
                                        <a href="{{route('user.plan.buy',['id'=>$plan->id])}}" class="theme-btn btn-style-three">{{__('Select')}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="tab" id="annual">
            <div class="content">
                <div class="row">
                    @foreach($plans as $plan)
                        <?php if(!$plan->annual_price) continue;?>
                        <div class="pricing-table col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                @if($plan->is_recommended)
                                    <span class="tag">{{__('Recommended')}}</span>
                                @endif
                                <div class="title">{{$plan->title}}</div>
                                <div class="price">{{format_money($plan->annual_price)}} <span class="duration">/ {{__("yearly")}}</span></div>
                                <div class="table-content">
                                    {!! clean($plan->content) !!}
                                </div>
                                <div class="table-footer">
                                    @if($user and $user_plan = $user->user_plan and $user_plan->plan_id == $plan->id)
                                        @if($user_plan->is_valid)
                                            <a href="#" class="theme-btn btn-style-one">{{__("Current Plan")}}</a>
                                        @else
                                            <a href="{{route('user.plan.buy',['id'=>$plan->id,'annual'=>1])}}" class="theme-btn btn-style-two">{{__('Renew')}}</a>
                                        @endif
                                    @else
                                        <a href="{{route('user.plan.buy',['id'=>$plan->id,'annual'=>1])}}" class="theme-btn btn-style-three">{{__('Select')}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
