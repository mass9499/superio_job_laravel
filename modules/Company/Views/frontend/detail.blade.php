@extends('layouts.app')
@section('head')

@endsection
@section('content')

@php $translation = $row->translateOrOrigin(app()->getLocale()); @endphp
    @include('Company::frontend.layouts.details.ver.'. $style)
@endsection


