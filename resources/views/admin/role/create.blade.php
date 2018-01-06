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
              <h3 class="box-title">Role Details</h3>
              @include('includes.messages')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('role.store') }}" method="post">
              {{ csrf_field() }}
              

        <div class="box-body">
              


            <div class="row">

              

                        <div class="col-md-6 col-md-offset-3">

                            <div class="form-group">
                              <label for="title">Role Name </label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Role name">
                            </div>

                            <div class="col-lg-4">

                              <label>Posts Permissions</label>

                              @forelse($permissions as $permission)
                                @if($permission->for == 'post')
                              <div class="checkbox">
                                <label><input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label>
                              </div>
                                @endif
                              @empty
                                 <div class="checkbox">
                                <label><input type="checkbox" name="name" value="">No Posts Permission</label>
                              </div>
                              @endforelse
             
                            </div>


                            <div class="col-lg-4">

                                <label>Others Permissions</label>
                              
                             @forelse($permissions as $permission)
                                @if($permission->for == 'other')
                              <div class="checkbox">
                                <label><input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label>
                              </div>
                                @endif
                              @empty
                                 <div class="checkbox">
                                <label><input type="checkbox" name="name" value="">No Others Permission</label>
                              </div>
                              @endforelse
             
                      

                            </div>

                          

                            <div class="col-lg-4">

                                <label>Users Permissions</label>
                              
                             @forelse($permissions as $permission)
                                @if($permission->for == 'user')
                              <div class="checkbox">
                                <label><input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->name}}</label>
                              </div>
                                @endif
                              @empty
                                 <div class="checkbox">
                                <label><input type="checkbox" name="name" value="">No Users Permission</label>
                              </div>
                              @endforelse
             
                      

                            </div>

                          

                            </div>

            </div>


 
              <div class="form-group col-lg-4 col-lg-offset-3">
                <button type="submit" class="btn btn-primary btn-md">Create Role</button>
                <a href="{{route('role.index')}}" class="btn btn-danger btn-md">Cancel</a>
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