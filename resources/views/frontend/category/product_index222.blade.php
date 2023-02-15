@extends('frontend.layouts.master')
@section('title')
    {{$categories->name}}

@endsection
@section('content')
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                @if($categories->brands)
                <form action="{{route('product.brand',$categories->id)}}" method="GET">
                    @csrf
                <div class="card">
                    <div class="card-header"><h4>Brands</h4></div>
                    <div class="card-body ">
                        @foreach($categories->brands as $branditem)
                            @php
                                $checked=[];
                                if (isset($_GET['brandinput']))
                                    {
                                        $checked =$_GET['brandinput'];
                                    }
                            @endphp
                        <label class="d-block form-check-label" for="checkbox-{{$branditem->id}}" >
                            <input class="form-check-input" type="checkbox" name="brandinput[]"

                                   value="{{$branditem->name}}" id="checkbox-{{$branditem->id}}"
                                   @if(in_array($branditem->id,$checked)) checked
                                       @endif
                            /> {{$branditem->name}}
                            <input type="hidden" value="{{$categories->id}}" name="cat_id">
                        </label>
                        @endforeach

                       {{-- <button type="submit" class="btn btn-outline-secondary float-end">Filter</button>--}}
                    </div>
                </div>
                                        {{--radio--}}
                    <div class="card mt-3">
                        <div class="card-header"><h4>Price</h4></div>
                        <div class="card-body ">

                                <label class="d-block form-check-label" for="radio_high" >
            <input class="form-check-input" type="radio" name="priceInput"  value="high-to-low" id="radio_high"/> High to low

                                </label>
                            <label class="d-block form-check-label" for="radio_low" >
            <input class="form-check-input" type="radio" name="priceInput"  value="low-to-high" id="radio_low"/> Low to high

                                </label>

                            <button type="submit" class="btn btn-outline-secondary float-end">Filter</button>
                        </div>
                    </div>
                </form>
                @endif

            </div>

            <div class="col-lg-9">


                <div class="row">
                    @forelse($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">

                            <div class="card rounded-0 resimKapsayici">
                                @if($product->quantity>0)
                                    <button type="button" class="btn btn-success btn-sm align-right resimYazisi">In stock</button>
                                @else
                                    <button type="button" class="btn btn-danger btn-sm align-right resimYazisi">Out stock</button>
                                @endif

                                @if($product->productImages->count()>0)
                                    <img class="card-img rounded-0 img-fluid" src="{{asset($product->productImages[0]->image)}}" style="width: 300px;height: 300px">
                                    <style>
                                        .resimKapsayici {position:relative}
                                        .resimYazisi {position:absolute;left:10px;top:10px;}
                                    </style>

                                @endif

                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none">{{$product->name}}</a>
                                <span class="float-end mb-0 fw-bold">{{$product->brand}}</span>

                                <br>
                                <span class="text-left mb-0 fw-bold">${{$product->selling_price}}</span>
                                <span class="text-decoration-line-through fw-light float-end">${{$product->original_price}}</span>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">



                                </ul>

                            </div>

                        </div>

                    </div>
                    @empty
                        <div class="col-md-12">
                           <h5> No Products Avialable for {{$categories->name}}</h5>
                        </div>
                    @endforelse

                </div>
                <div div="row">
{{--                    @if($categories->name)
                        {{$products->links('pagination::bootstrap-4')}}
                    @endif--}}
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->
@endsection

