
@extends('backend.layouts.master')
@section('title','Edit Product')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Product
                        <a href="{{route('product.index')}}" class="btn btn-outline-danger btn-sm float-end btn-rounded">List Products</a>
                    </h3>
                </div>
                @if(session('message'))
                    <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alet alert-danger">
                            @foreach($errors->all() as $error)
                                <ul><li>{{$error}}</li></ul>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{route('product.update',$products->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag" type="button" role="tab" aria-controls="seotag" aria-selected="false">
                                SEO tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">
                                Details</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ProductImage-tab" data-bs-toggle="tab" data-bs-target="#ProductImage" type="button" role="tab" aria-controls="ProductImage" aria-selected="false">
                                Product Image</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ProductColor-tab" data-bs-toggle="tab" data-bs-target="#ProductColor" type="button" role="tab" aria-controls="ProductColor" aria-selected="false">
                                Product Color</button>
                        </li>
                    </ul>


                    <div class="tab-content" id="myTabContent">
                        {{--                                    Home --}}
                        <div class="tab-pane fade border p-3 show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <div class="form-group mb-3">
                                <label for="exampleFormControlCategory" class="form-label">Category</label>
                                <select class="form-select" id="exampleFormControlCategory" name="category_id">
                                  {{--  <option value="0" selected>Open this Category menu</option>--}}
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"  {{$category->id == $products->category_id ? 'selected':''}}>

                                            {{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleFormControlName" class="form-label">Name</label>
                                <input id="exampleFormControlName" type="text" name="name"  class="form-control" value="{{$products->name}}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleFormControlBrand" class="form-label">Brand</label>
                                <select name="brand" id="exampleFormControlBrand" class="form-select">
                                   {{-- <option value="0" selected>Open this Brands menu</option>--}}
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->name}}" {{$brand->name == $products->brand ? 'selected':''}}>
                                            {{$brand->name}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group  mb-3">
                                <label for="Description" class="form-label">Description</label>
                                <textarea id="description" class="form-control" name="description" id="" rows="3">{{$products->description}}</textarea>
                            </div>

                            <div class="form-group  mb-3">
                                <label for="Small_description" class="form-label">Small_description</label>
                                <textarea id="small_description" class="form-control" name="small_description" id="" rows="3">{{$products->small_description}}</textarea>
                            </div>
                        </div>

                        {{--                                    Seo tags --}}

                        <div class="tab-pane fade border p-3" id="seotag" role="tabpanel" aria-labelledby="seotag-tab">
                            <br>
                            <div class="form-group mb-3">
                                <label for="meta_title" class="form-label">Meta_title</label>
                                <input id="meta_title" type="text" name="meta_title"  class="form-control" value="{{$products->meta_title}}">
                            </div>

                            <div class="form-group  mb-3">
                                <label for="meta_keyword" class="form-label">Meta_keyword</label>
                                <textarea id="meta_keyword" class="form-control" name="meta_keyword" id="" rows="3">{{$products->meta_keyword}}</textarea>
                            </div>

                            <div class="form-group  mb-3">
                                <label for="meta_description" class="form-label">Meta_description</label>
                                <textarea id="meta_description" class="form-control" name="meta_description" id="" rows="3">{{$products->meta_description}}</textarea>
                            </div>

                        </div>
                        {{--                                    Details --}}
                        <div class="tab-pane fade border p-3" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="original_price" class="form-label">Original_price</label>
                                        <input id="original_price" type="text" name="original_price" class="form-control" value="{{$products->original_price}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="selling_price" class="form-label">Selling_price</label>
                                        <input id="selling_price" type="text" name="selling_price"  class="form-control" value="{{$products->selling_price}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input id="quantity" type="number" name="quantity"  class="form-control" value="{{$products->quantity}}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="trending" class="form-label">Trending</label>
                                        <input id="trending"  type="checkbox" name="trending" style="width: 50px;height: 50px"
                                            {{$products->trending  =='1'? 'checked':''}}>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <input id="status" type="checkbox" name="status" style="width: 50px;height: 50px"
                                            {{$products->status  =='1'? 'checked':''}}
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                                    Image --}}

                        <div class="tab-pane fade border p-3" id="ProductImage" role="tabpanel" aria-labelledby="ProductImage-tab">
                            <br>
                            <div class="form-group mb-3">
                                <div class="form-group">
                                    <input type="file" class="form-control"  name="image[]" multiple placeholder="Choose image" id="image">

                            </div>

                                @if($products->productImages)
                                    <div class="row">
                                        @foreach($products->productImages as $image)
<div class="col-md-2">
    <img src="{{asset($image->image)}}"  style="width: 80px;height: 80px;"
         class="me-4  rounded " alt="Img" />
    <a href="{{route('product.ProductImageDel',$image->id)}}" class="d-block">Remove</a>
</div>
                                        @endforeach

                                    </div>



                                @else
                                    <h5>No image Added</h5>
                                @endif

                        </div>


                    </div>
{{--                        ProductColor--}}
                        <div class="tab-pane fade border p-3" id="ProductColor" role="tabpanel" aria-labelledby="ProductColor-tab">
<div class="mb-3">
                            <h5>Add product color</h5>
    <br>
    <label for="">Select Color </label>

    <div class="row">
        @forelse($colors as $color)
            <div class="col-md-3">
                <div class="p-2 border mb-3">Color:
                    <input class="form-check-label" type="checkbox"
                           name="colors[{{$color->id}}]" style="width: 20px;height: 20px"
                           value="{{$color->id}}" >
                    <strong
                        style="color:{{$color->code}}" >
                        @if($color->code=='#ebe0e0' or $color->name=='White' or $color->code =='#ffffff' or $color->name=='white')
                            <strong  style="background-color: #76838f">White</strong>
                        @else
                            {{$color->name}}
                        @endif
                    </strong>
                    <br>
                    Quantity:
                    <input type="number"  name="Color_quantity[1,3,5]" style="width: 70px;border: 1px solid">
                </div>
            </div>

        @empty
            <div class="col-md-12">
                <h5 class="text-danger">No color found</h5>
            </div>

        @endforelse
    </div>
</div>
@if(count($products->productColors)>0)

         <hr>
         <br>
     <div class="table-responsive">
         <table class="table   table-sm table table-bordered  table-hover">
             <thead >
             <tr>
                 <th>Color ID</th>
                 <th>Color Name</th>
                 <th>Quantity</th>
                                        <th>Action</th>
                 </tr>
                 </thead>
                 <tbody>
                 @foreach($products->productColors as $productColor)
                     <tr>
                         @if($productColor->color)
                             <td>{{$productColor->color->id}}</td>
              <td>{{$productColor->color->name}}</td>
              <td>{{$productColor->Color_quantity}}</td>
              <td> <a href="{{route('product.edit',$productColor->color->id)}}"
                     data-bs-toggle="modal" data-bs-target="#exampleModal{{$productColor->color->id}}"
                                        class="btn btn-outline-primary btn-sm" ><i class="fas fa-edit"></i></a>
                                     <a href="{{route('product.deleteProdColorQty',$productColor->id)}}"
                                        onclick="return confirm('Are you sure,you want to delete this data?')"
                                        class="btn btn-outline-danger btn-sm">
                                         <i class="fas fa-times "></i>
                                     </a>
                                 </td>
                                 @include('backend.product.modal')
                             @else
                                 <h3>
                                     <td>No color found</td>
                                 </h3>
                                 @endif
                         </tr>
                 @endforeach
                 </tbody>
         </table>
     </div>
                            @endif


                        </div>

                        <div class="d-grid gap-2 col-6 mx-auto">
                           <button type="submit" class="btn btn-outline-primary btn-sm float-end btn-rounded"> Update</button>
                    </div>


                </div>

            </div>
        </div>




    </div>

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">

    $(document).ready(function (e) {


        $('#image').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#preview-image-before-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);

        });

    });

</script>


@section('summernote_css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection


@section('summernote_js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#small_description').summernote(
                {
                    placeholder: 'Small_description',
                    tabsize: 2,
                    height: 100
                }
            );

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#description').summernote(
                {
                    placeholder: 'Descriptionn',
                    tabsize: 2,
                    height: 100
                }
            );
        });
    </script>
            <script>
        $(document).ready(function() {
            $('#meta_description').summernote(
                {
                    placeholder: 'Meta_description',
                    tabsize: 2,
                    height: 100
                }
            );
        });
    </script>


@endsection







