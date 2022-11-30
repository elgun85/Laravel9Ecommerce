
@extends('backend.layouts.master')
@section('title','Products')
@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>
                        Products
                        <a href="{{route('product.create')}}" class="btn btn-outline-primary btn-sm float-end btn-rounded">Add Products</a>
                    </h3>
                </div>
                <div class="card-body">
                    {{--Table start--}}
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->brand}}</td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->status == '1'? 'Hidden':'Visible'}}</td>
                                <td>
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-outline-primary btn-sm" ><i class="fas fa-edit"></i></a>
                                    <a href="{{route('product.delete',$product->id)}}"
                                       onclick="return confirm('Are you sure,you want to delete this data?')"
                                       class="btn btn-outline-danger btn-sm"><i class="fas fa-times "></i> </a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="8" class="text-center">No Brand Available</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{--Table finish--}}



                </div>
            </div>
        </div>


    </div>

@endsection


@section('toastr_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('toastr_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            @if(Session::has('message'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
            toastr.success("{{ session('message') }}");
            @endif

                @if(Session::has('error'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
            toastr.error("{{ session('error') }}");
            @endif

                @if(Session::has('info'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
            toastr.info("{{ session('info') }}");
            @endif

                @if(Session::has('warning'))
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true
                }
            toastr.warning("{{ session('warning') }}");
            @endif
        });
    </script>
@endsection



