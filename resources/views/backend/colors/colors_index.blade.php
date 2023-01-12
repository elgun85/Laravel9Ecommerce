
@extends('backend.layouts.master')
@section('title','Color create')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3>
                                        Add Color
                                    </h3>
                                </div>
                                <div class="card-body">

                                    <form action="{{route('colors.store')}}" method="post">
                                        @csrf

{{--                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text"  name="name"  placeholder="Name" class="form-control" value="{{old('name')}}">
                                            @error('name') <smal class="text-danger">{{$message}}</smal> @enderror
                                        </div>--}}
                                        <div class="form-group">
                                            <label for="exampleColorInput" class="form-label">Color picker</label>
                                            <input type="color" name="code" class="form-control form-control-color" id="exampleColorInput" value="{{old('code')}}" title="Choose your color">
                                            @error('code') <smal class="text-danger">{{$message}}</smal> @enderror


                                            <input type="text" required name="name"  placeholder="Name color" class="form-control" value="{{old('name')}}">
                                            @error('name') <smal class="text-danger">{{$message}}</smal> @enderror
{{--                                            <label>Code</label>
                                            <input type="text"  name="code"  placeholder="Code" class="form-control" value="{{old('code')}}">
                                            @error('code') <smal class="text-danger">{{$message}}</smal> @enderror--}}
                                        </div>

                                        <div class="form-group ">
                                            <label class="form-check-label" for="inlineCheckbox2">Status</label><br>
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                   name="status" style="width: 30px;height: 30px"  >
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
                                        Colors list
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-hover ">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($colors as $color)
                                            <tr>
                                                <td>{{$color->id}}</td>
                                                <td>{{$color->name}}</td>
                                                <td>{{$color->code}}</td>
                                                <td>{{$color->status == '1'? 'Hidden':'Visible'}}</td>
                                                <td>
                                                    <a href="{{route('colors.edit',$color->id)}}" class="btn btn-outline-primary btn-sm" ><i class="fas fa-edit"></i></a>
                                                    <a href="{{route('colors.delete',$color->id)}}" class="btn btn-outline-danger btn-sm"
                                                       onclick="return confirm('Are you sure,you want to delete this data?')"
                                                    ><i class="fas fa-times "></i> </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="5">No Color Found</td></tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    <div>
                                        {{$colors->links('pagination::bootstrap-4')}}
                                    </div>

                                </div>
                            </div>
                        </div>


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



