@extends('frontend.layouts.master')
@section('title',$orders->fullname)
@section('content')
    <!-- Start Categories of The Month -->
    <section class="container py-5">

        <div class="row">

            <div class="shadow bg-white p-3">
                <h4 class="text-primary">
                    <i class="fa fa-shopping-cart text-dark"></i>
                    My Orders Details
                    <a href="{{  route('orders') }}" class="btn btn-outline-danger btn-sm float-end"> Back</a>
                </h4>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <h5>Order Details</h5>
                        <hr>
                        <h6>Order_id: {{$orders->id}}</h6>
                        <h6>Tracking_no: {{$orders->tracking_no}}</h6>
                        <h6>Ordered date: {{$orders->created_at->format('d.m.Y')}}</h6>
                        <h6>Payment mode: {{$orders->payment_mode}}</h6>
                        <h6 class="border p-2 text-success">
                            order status message:  <span class="text-uppercase"> in progress</span>
                        </h6>
                    </div>
                    <div class="col-md-6">
                        <h5>User Details</h5>
                        <hr>
                        <h6>Full name: {{$orders->fullname}}</h6>
                        <h6>Email: {{$orders->email}}</h6>
                        <h6>Pin code: {{$orders->pincode}}</h6>
                        <h6>Phone: {{$orders->phone}}</h6>
                        <h6>Adress: {{$orders->address}}</h6>
                    </div>
                </div>
                <br>
                <h4>Order Items</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover table-striped  text-center ">
                        <thead>
                        <tr >
                            <th>Item id</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $total=0;
                        @endphp
                        @foreach($orders->OrderItems as $orderItem)
                        <tr >
                            <td>{{$orderItem->id}}</td>
                            <td>
                                @if($orderItem->product->productImages)
                                    <img src="{{$orderItem->product->productImages[0]->image}}" style="width: 50px; height: 50px" alt="">
                                @else
                                    <img src="" style="width: 50px; height: 50px" alt="">
                                @endif

                                @if($orderItem->productColor)
                                    @if($orderItem->productColor->color)
                                        - Color:
                                        <span style="color: {{$orderItem->productColor->color->code}}">
                                            {{$orderItem->productColor->color->name}}
                                                </span>
                                    @endif
                                @endif
                            </td>
                            <td>{{$orderItem->product->name}}</td>

                            <td>{{$orderItem->price}}</td>
                            <td>{{$orderItem->quantity}}</td>
                            <td class="fw-bold">{{$orderItem->price * $orderItem->quantity}}</td>
                            @php
                                $total+=$orderItem->price * $orderItem->quantity;


                            @endphp
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="1" class="fw-bold ">Total</td>
                            <td colspan="4"  >&nbsp;</td>
                            <td colspan="1" class="fw-bold">{{$total}}</td>
                        </tr>
                        </tbody>

                    </table>
                </div>





            </div>






        </div>
    </section>
    <!-- End Categories of The Month -->

@endsection

