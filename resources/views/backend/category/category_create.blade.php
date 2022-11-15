@extends('backend.layouts.master')
@section('title','Create new Category')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                Add Category 
                                <a href="{{route('category.create')}}" class="btn btn-primary btn-sm text-white float-end"> Back</a>
                            </h3>
                        </div>

                        <div class="card-body">
                            <form action="{{route('category.index')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
              <div class="form-group col-md-12">
                  <div class="form-group">
                      <input type="file" name="image" placeholder="Choose image" id="image">
                        @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                  </div>
              </div>

              <div class="form-group col-md-12 mb-2">
                  <img class="rounded-circle" id="preview-image-before-upload" src=""
                     style="max-height: 150px;max-width: 150px;" >
              </div>

                                    <div class="form-group col-md-12">
                                        <label for="">Name</label>
                                                   <input type="text" name="name" placeholder="Name" class="form-control" value="{{old('name')}}">
                                            @error('name') <smal class="text-danger">{{$message}}</smal> @enderror
                                    </div>



                                    <div class="form-group col-md-6 mb-3">
                                        <label for="">Status</label><br>
                                        <input type="checkbox" name="status" >
                                    </div>

{{--                                    <div class="form-group col-md-12">
                                        <h4>SEO Tags</h4>
                                    </div>--}}

                                    <div class="form-group col-md-12 mb-3">
                                        <label for="">Meta_title</label>
                                        <input type="text" name="meta_title" class="form-control" placeholder="Meta_title" value="{{old('meta_title')}}">
                                        @error('meta_title') <smal class="text-danger">{{$message}}</smal> @enderror
                                    </div>

                                    <div class="form-group col-md-12 mb-3">
                                        <label for="">Meta_keyword</label>
                                        <input type="text" name="meta_keyword" class="form-control" placeholder="Meta_keyword" value="{{old('meta_keyword')}}">
                                        @error('meta_keyword') <smal class="text-danger">{{$message}}</smal> @enderror
                                    </div>

                                    <div class="form-group col-md-12 mb-3">
                                        <label for="">Description</label>
                                        <textarea id="description" class="form-control" name="description" id="" rows="3">{{old('description')}}</textarea>
                                        @error('description') <smal class="text-danger">{{$message}}</smal> @enderror
                                    </div>

                                    <div class="form-group col-md-12 mb-3">
                                        <label for="">Meta_description</label>
                                        <textarea id="meta_description" class="form-control" name="meta_description" id="" rows="3">{{old('meta_description')}}</textarea>
                                        @error('meta_description') <smal class="text-danger">{{$message}}</smal> @enderror
                                    </div>

                                    <div class="form-group col-md-12 mb-3">
                                        <button type="submit" class="btn btn-primary float-end">Save</button>

                                    </div>

                                </div>
                            </form>
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

           {{-- <script
                type="text/javascript">
                $(document).ready(function (e) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#image').change(function(){
                        let reader = new FileReader();
                        reader.onload = (e) => {
                            $('#preview-image-before-upload').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                    });

                });

            </script>--}}


            @section('summernote_css')
                <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

            @endsection


            @section('summernote_js')
                <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

                <script>
                    $(document).ready(function() {
                        $('#description').summernote(
                            {
                                placeholder: 'Description',
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

{{--                <script>
                    $(function () {
                        // Summernote
                        $('#summernote').summernote()

                        // CodeMirror
                        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                            mode: "htmlmixed",
                            theme: "monokai"
                        });
                    })
                </script>

                <script>
                    $(function () {
                        // Summernote
                        $('#meta_description').summernote()

                        // CodeMirror
                        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                            mode: "htmlmixed",
                            theme: "monokai"
                        });
                    })
                </script>--}}
@endsection
