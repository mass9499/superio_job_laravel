@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/gig/css/gig.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
@endsection
@section('content')

    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>{{$page_title}}</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ home_url() }}">{{ __("Home") }}</a></li>
                    <li>{{ __("Gigs") }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <div class="gig_category_level1">
        <div class="auto-container">
            @if($rows->isNotEmpty())
                <div class="mt-5">
                    <div class="ls-outer mb-4">
                        @include('Gig::frontend.search.filter')
                        <div class="row mb-5">
                            @foreach($rows as $row)
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                                    @include('Gig::frontend.search.loop')
                                </div>
                            @endforeach
                        </div>
                        <div class="ls-pagination">
                            {{$rows->appends(request()->query())->links()}}
                        </div>
                    </div>
                </div>
            @else
                <div class="bc-page-404">
                    <div class="row mb-5 mb-md-7 mb-lg-0 ">
                        <div class="col-lg-5 col-xl-3dot5">
                            <div class="space-lg-1 space-xl-3 mt-xl-2 mb-5 mb-md-7 mb-lg-0">
                                <div class="font-weight-bold on-no-text">{{__("Ops")}}</div>
                                <h6 class="title-404">{{__('No Results Found For Your Search')}}</h6>
                                <p class="error-desc">{{__('Try a new search or get a free quote for your project from our community of freelancers.')}}</p>
                                <a href="{{route('gig.search')}}" class="btn btn-primary rounded-xs transition-3d-hover font-weight-bold min-width-190 min-height-60 d-inline-flex flex-content-center">
                                    {{__('Back to all')}}
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-xl-8dot5">
                            <div class="space-lg-2 space-xl-3 mt-lg-5 mt-xl-7">
                                <img src="http://127.0.0.1:8000/images/404.svg" alt="404">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/gig/js/gig.js?_ver='.config('app.version')) }}"></script>
@endsection
