<div>
{{--@include('backend.brand.model')--}}



<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>
                    Add Brand
                </h3>
            </div>
            <div class="card-body">

                <form action="" method="post">
                    @csrf


                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text"  name="name"  placeholder="Name" class="form-control" value="{{old('name')}}">
                            @error('name') <smal class="text-danger">{{$message}}</smal> @enderror
                        </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category_id" class="form-select" aria-label="Default select example" >
                            <option selected>--Select-- </option>
                            @foreach($categories as $category)
                                @if (old('category_id') == $category->id)
                                    <option value="{{$category->id}}"selected>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                            @endforeach

                        </select>
                        @error('category_id') <smal class="text-danger">{{$message}}</smal> @enderror

                    </div>

                        <div class="form-group ">
                            <label for="status">Status</label><br>
                            <input id="status" type="checkbox" name="status" >
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
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
@forelse($brands as $brand)
    <tr class="text-center">
        <td>{{$brand->id}}</td>
        <td>{{$brand->name}}</td>
        @if($brand->category_id)
            <td>{{$brand->category->name}}</td>
        @else
            <td>No Category</td>
        @endif
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
                    {{$brands->links()}}
                </div>

            </div>
        </div>
    </div>


</div>


</div>

{{--@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#AddBrandModal').modal('hide');
            $('#UpdateBrandModal').modal('hide');
        });
    </script>
@endpush--}}
