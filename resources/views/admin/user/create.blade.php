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
              <h3 class="box-title">New Admin Details</h3>
              @include('includes.messages')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{ route('user.store') }}" method="post">
              {{ csrf_field() }}
              <div class="box-body">
              


            <div class="col-md-6 col-md-offset-3">


                <div class="form-group">
                  <label for="name">Admin Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Admin name" value="{{ old('name') }}">
                </div>


                <div class="form-group">
                  <label for="email">Admin Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Admin email" value="{{ old('email') }}">
                </div>


                <div class="form-group">
                  <label for="phone">Admin Phone</label>
                  <input type="number" class="form-control" name="phone" id="phone" placeholder="Admin Phone No" value="{{ old('phone') }}">
                </div>


                <div class="form-group">
                  <label for="password">Admin Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Admin Password" value="{{ old('password') }}">
                </div>

       

                <div class="form-group">
                  <label for="password_confirmation">Confirm Password</label>
                  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                </div>


                <div class="form-group">
                  <label for="password_confirmation">Status</label>
                    <div class="checkbox">
                        <label>                            
                            <input type="checkbox" name="status" value="1"

                                @if(old('status') == 1)
                                  checked="checked"
                                @endif 

                            > Status
                        </label>
                      </div>

                </div>

                <div class="form-group">
                  
                  <label>Assign Roles</label>
                  <div class="row">
                    @forelse($roles as $role)
                    <div class="col-lg-3">

                      <div class="checkbox">

                        <label>
                            
                            <input type="checkbox" name="role[]" value="{{$role->id}}"> {{ $role->name }}

                        </label>

                      </div>

                    </div>
                  @empty
                  <span class="alert alert-danger">No Roles Available</span>
                  @endforelse
                  </div>
                     

                </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-md">Create Admin</button>
                <a href="{{route('user.index')}}" class="btn btn-danger btn-md">Cancel</a>
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