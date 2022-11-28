
@extends('backend.layouts.master')
@section('title','Edit Brands')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Brand
                    </h3>
                </div>
                <div class="card-body">

                    <form action="{{route('brand.update',$brands_edit->id)}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text"  name="name"  placeholder="Name" class="form-control" value="{{$brands_edit->name}}">
                            @error('name') <smal class="text-danger">{{$message}}</smal> @enderror
                        </div>

                        <div class="form-group ">
                            <label for="">Status</label><br>
                            <input type="checkbox" name="status" {{$brands_edit->status =='1'? 'checked':'' }} >
                            @error('status') <smal class="text-danger">{{$message}}</smal> @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-end">Save</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>



        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Brand list
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($brands as $brand)
                            <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{$brand->status == '1'? 'Hidden':'Visible'}}</td>
                                    <td>
                                        <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-outline-primary btn-sm" ><i class="fas fa-edit"></i></a>
                                        <a href="{{route('brand.delete',$brand->id)}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-times "></i> </a>
                                    </td>
                                </tr>
                        @empty
                            <tr><td colspan="5">No Brand Found</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{--        {{$brands->links()}}--}}
                    </div>

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



