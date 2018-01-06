@extends('admin.layouts.app')

@section('headSection')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/select2/dist/css/select2.min.css') }}">
<!-- <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script> -->
@endsection



@section('main-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Text Editors
        <small>Advanced form element</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

              <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Post Details</h3>

             @include('includes.messages')

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}

              <div class="box-body">

              <div class="col-md-6">

                <div class="form-group">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter Post Title">
                </div>

       
                <div class="form-group">
                  <label for="title">Post Sub Title</label>
                  <input type="text" class="form-control" name="subtitle" id="sub" placeholder="Enter Post Sub Title">
                </div>

       
                <div class="form-group">
                  <label for="title">Post Slug</label>
                  <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter Post Slug">
                </div>

            </div>


            <div class="col-md-6">

                  <div class="form-group">
                  
                  <br>
                    <div class="pull-right">
                    <label for="exampleInputFile">Upload Image</label>
                    <input type="file" name="image" id="exampleInputFile">
                    </div>

                    <div class="pull-left">
                           <div class="checkbox">
                  <label>
                    <input type="checkbox" name="status" value="1">
                      Publish?
                  </label>
                </div>
                    </div>

                  </div>

              <br>

              <div class="form-group" style="margin-top: 18px">
                <label>Select Tag</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a Tag"
                        style="width: 100%;" name="tags[]">

                  @forelse($tags as $tag)
                  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @empty
                  <option>No Tags Available</option>
                  @endforelse

                </select>
              </div>
            


              <div class="form-group" style="margin-top: 18px">
                <label>Select Category</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Select a Category"
                        style="width: 100%;" name="categories[]">
                  @forelse($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @empty
                  <option>No Categories Available</option>
                  @endforelse
                </select>
              </div>
            


            </div>
             
     </div>
              <!-- /.box-body -->
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Post Body
                <small>Simple and fast</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i>
                </button>

              <!--
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i>
                </button>
              -->

              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->


            <div class="box-body pad">
            
            <textarea id="my-editor" class="form-control" placeholder="Place some text here" name="body" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
           <script src="https://cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
            <script>
              var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
              };
            </script>
            <script>
            CKEDITOR.replace('my-editor', options);
            </script>

            </div>
          </div>



              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-md">Submit Post</button>

                <a href="{{route('post.index')}}" class="btn btn-danger btn-md">Cancel</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
  

          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection





@section('footerSection')

<script type="text/javascript" src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script>

  $('document').ready(function() {

    $('.select2').select2();

});
  
</script>

@endSection