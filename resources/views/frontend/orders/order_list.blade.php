@extends('frontend.layouts.master')
@section('title','Order list ')
@section('content')
    <!-- Start Categories of The Month -->
    <section class="container py-5">

        <div class="row">
<div class="col-md-12">

    <div class="shadow bg-white p-3">
        <h4 class="mb-4">

            My orders
        </h4>
        <hr>



    <table class="table table-hover table-responsive">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Fullname</th>
            <th scope="col">Traking_no</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td >{{$item->fullname}}</td>
                <td >{{$item->tracking_no}}</td>
                <td >{{$item->email}}</td>
                <td >{{$item->status_message}}</td>
                <td >{{$item->created_at->format('d-m-Y')}}</td>
                <td ><a href="{{route('orders_show',$item->id)}}" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                    </a></td>
            </tr>
        @empty
            <tr>
                <td colspan="9"> No found order</td>
            </tr>

        @endforelse


        </tbody>
    </table>
    {{$orders->links('pagination::bootstrap-4')}}
    </div>
</div>



        </div>
    </section>
    <!-- End Categories of The Month -->

@endsection





