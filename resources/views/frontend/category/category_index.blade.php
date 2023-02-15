@extends('frontend.layouts.master')
@section('title','Category')
@section('content')
    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Categories</h1>

            </div>
        </div>
        <div class="row">
            @forelse($categories as $category)
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="{{route('product',$category->slug)}}"><img src="{{asset($category->image)}}" class="rounded-circle img-fluid border center " style="height: 350px;width: 350px"></a>

                <h5 class="text-center mt-3 mb-3">{{$category->name}}</h5>
                <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
            </div>
            @empty
                <div class="col-md-12">
                    <h5>No Categories Available</h5>
                </div>
                @endforelse


        </div>
    </section>
    <!-- End Categories of The Month -->

@endsection

