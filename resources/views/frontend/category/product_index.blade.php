@extends('frontend.layouts.master')
@section('title')
    {{$category->name}}
  {{--  {{'Category'}}--}}

@endsection
@section('content')
    <!-- Start Content -->
    <livewire:frontend.product.index :category="$category"/>
    <!-- End Content -->

@endsection

