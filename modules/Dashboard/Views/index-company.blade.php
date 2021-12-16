@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="dashboard-page">
            <h4 class="welcome-title text-uppercase">{{__('Welcome :name!',['name'=>Auth::user()->nameOrEmail])}}</h4>
        </div>
        <br>
        <div class="row">
            @if(!empty($top_cards))
                @foreach($top_cards as $card)
                    <div class="col-sm-{{$card['size']}} col-md-{{$card['size_md']}}">
                        <div class="dashboard-report-card card {{$card['class']}}">
                            <div class="card-content">
                                <span class="card-title">{{$card['title']}}</span>
                                <span class="card-amount">{{$card['amount']}}</span>
                                <span class="card-desc">{{$card['desc']}}</span>
                            </div>
                            <div class="card-media">
                                <i class="{{$card['icon']}}"></i>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <br>
        <div class="row">
        </div>
    </div>
@endsection

@section('script.body')

@endsection
