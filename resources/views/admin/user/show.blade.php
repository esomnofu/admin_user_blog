@extends('admin.layouts.app')


@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection




@section('main-content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home Page
        <small>Welcome Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Admin Home</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Admin Users</h3>

          @can('admins.create', Auth::user())
          <a class="col-md-offset-5 btn btn-sm btn-success" href="{{route('user.create')}}">Add New</a>
          @endcan

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">


          <!-- START DATA TABLES --> 
          <!-- START DATA TABLES --> 
          <!-- START DATA TABLES --> 
          <!-- /.box -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Records of all Tags</h3>
              @include('includes.messages');
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Admin Name</th>
                  <th>Admin Phone</th>
                  <th>Email Address</th>
                  <th>Status</th>
                  <th>Role(s)</th>
                  @can('admins.update', Auth::user())
                  <th>Edit</th>
                  @endcan

                  @can('admins.delete', Auth::user())
                  <th>Delete</th>
                  @endcan

                </tr>
                </thead>
                <tbody>


                @forelse($users as $user)
                <tr>
                  <td> {!! $loop->index + 1 !!} </td>
                  <td> {!! $user->name !!}  </td>
                  <td> {!! $user->phone !!}  </td>
                  <td> {!! $user->email !!}  </td>
                  <td> {{ $user->status? 'Active' : 'Not Active' }} </td>
                  <td> 
                    @forelse($user->roles as $role)
                          {{ $role->name }} |
                    @empty
                    @endforelse

                  </td>
                 
                 @can('admins.update', Auth::user())
                 <td> <a href="{{ route('user.edit', $user->id) }}"> Edit <span class="glyphicon glyphicon-edit"></span> </a> </td>
                 @endcan

                @can('admins.delete', Auth::user())
                <td>

              <form id="delete-form-{{ $user->id }}" method="post" action="{{ route('user.destroy', $user->id) }}" style="display: none;">

                {{ csrf_field() }}
                
                {{ method_field('DELETE') }}

              </form>

                <a href="" 
                onclick="if(confirm('Delete this User???'))
                  {
                  event.preventDefault();document.getElementById('delete-form-{{ $user->id }}').submit();
                  }else
                  {
                  event.preventDefault();
                   }"> Delete <span class="glyphicon glyphicon-trash"></span> </a> 

                </td>
                @endcan
                </tr>
                @empty
                <tr>
                  <td colspan="5"> <strong> No Users Available </strong> </td>
                </tr>
                @endforelse
    
         
                </tbody>
                <tfoot>
         
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- END DATA TABLES --> 
          <!-- END DATA TABLES --> 
          <!-- END DATA TABLES --> 

         
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         Dear blogger &copy; 2017.
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

@section('footerSection')
<script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<script>
$(function () {
$('#example1').DataTable()
$('#example2').DataTable({
'paging'      : true,
'lengthChange': false,
'searching'   : false,
'ordering'    : true,
'info'        : true,
'autoWidth'   : false
})
})
</script>
@endsection