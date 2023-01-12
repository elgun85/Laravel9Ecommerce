
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Category
                            <a href="{{route('category.create')}}" class="btn btn-outline-primary btn-sm float-end">Add Category</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
@foreach($categories as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td><img src="{{asset($category->image)}}" alt="" width="40" height="40"></td>
        <td>{{$category->name}}</td>
        <td>{{$category->status == '1'? 'Hidden':'Visible'}}</td>
        <td>
            <a href="{{route('category.edit',$category->id)}}" class="btn btn-outline-primary btn-sm" ><i class="fas fa-edit"></i></a>
            <a href="{{route('category.delete',$category->id)}}" class="btn btn-outline-danger btn-sm"><i class="fas fa-times "></i> </a>

        </td>


    </tr>
@endforeach                            </tbody>

                        </table>
                        <div>
                            {{$categories->links()}}
                        </div>



                    </div>
                </div>
            </div>


        </div>


