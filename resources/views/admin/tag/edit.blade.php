@extends('admin.layouts.app')

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
              <h3 class="box-title">Edit this Tag</h3>
              @include('includes.messages')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('tag.update', $tag->id) }}" method="post">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              <div class="box-body">
              


            <div class="col-md-6 col-md-offset-3">

                <div class="form-group">
                  <label for="title">Tag Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Tag name" value="{{ $tag->name }}">
                </div>

       
                <div class="form-group">
                  <label for="title">Slug</label>
                  <input type="text" class="form-control" name="slug" id="slug" placeholder="Tag Slug" value="{{ $tag->slug }}">
                </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-md">Edit Tag</button>
                <a href="{{route('tag.index')}}" class="btn btn-danger btn-md">Cancel</a>
              </div>

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