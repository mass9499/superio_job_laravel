@extends('layouts.app')

@section('content')
<div class="page-profile-content page-template-content">
    <div class="container-fluid">
        <div class="">
            <div class="row">
                <div class="col-md-3">
                    @include('User::frontend.profile.sidebar')
                </div>
                <div class="col-md-9">
                    @include('User::frontend.profile.services')
                    @include('User::frontend.profile.reviews')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
