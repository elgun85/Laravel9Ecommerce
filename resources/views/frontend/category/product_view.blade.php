@extends('frontend.layouts.master')
@section('title')
    {{$product->name}}
    {{--  {{'Category'}}--}}

@endsection
@section('content')
    <!-- Start Content -->

    <livewire:frontend.product.product-view :category="$category" :product="$product" />
    <!-- End Content -->

@endsection

