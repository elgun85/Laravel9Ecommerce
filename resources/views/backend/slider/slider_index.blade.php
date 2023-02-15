
@extends('backend.layouts.master')
@section('title','Slider create')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    <h3>
                                        Add Slider
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <div class="form-group">
                                                <input type="file" class="form-control"  name="image" multiple placeholder="Choose image" id="image">

                                            </div>

                                            <div class="form-group mb-3">
                                                <img class="rounded float-start" id="preview-image-before-upload" src=""
                                                     style="max-height: 150px;max-width: 150px;" >
                                            </div>

                                        </div>


                                <div class="form-group mb-3">
                                    <label class="form-check-label" for="name">Title</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Title" value="{{old('name')}}" >
                                    @error('name') <smal class="text-danger">{{$message}}</smal> @enderror
                                </div>
                                 <div class="form-group  mb-3">
                                     <label for="Description" class="form-label">Description</label>
                                     <textarea id="Description" class="form-control" name="description" id="" rows="3">{{old('description')}}</textarea>
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

                        {{--slider list--}}

                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header">
                                    <h3>
                                        Slider list
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-hover ">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @forelse($sliders as $slider)
                                            <tr>
                                                <td>{{$slider->id}}</td>
                                                <td>@if($slider->image)
                                                        <img src=" {{asset($slider->image)}}" alt="" width="50" height="50">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(strlen($slider->name)>15)
                                                        {{substr($slider->name,0,15)}}...
                                                    @else
                                                        {{$slider->name}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(strlen($slider->description)>15)
                                                        {{substr($slider->description,0,15)}}...
                                                    @else
                                                        {{$slider->description}}
                                                    @endif
                                                </td>
                                                </td>
                                                <td>{{$slider->status == '1'? 'Hidden':'Visible'}}</td>
                                                <td>
                                                    <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-outline-primary btn-sm" ><i class="fas fa-edit"></i></a>
                                                    <a href="{{route('slider.delete',$slider->id)}}" class="btn btn-outline-danger btn-sm"
                                                       onclick="return confirm('Are you sure,you want to delete this data?')"
                                                    ><i class="fas fa-times "></i> </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="6"  class="text-center">No slider Found</td></tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                    <div>
                                        {{$sliders->links('pagination::bootstrap-4')}}
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



