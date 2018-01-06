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
          <h3 class="box-title">Roles</h3>

          <a class="col-md-offset-5 btn btn-sm btn-success" href="{{route('role.create')}}">Add New</a>

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
              <h3 class="box-title">Records of all Roles</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Role Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>


                @forelse($roles as $role)
                <tr>
                  <td> {!! $loop->index + 1 !!} </td>
                  <td> {!! $role->name !!}  </td>
                
                 <td> <a href="{{ route('role.edit', $role->id) }}"> Edit <span class="glyphicon glyphicon-edit"></span> </a> </td>

                <td>

              <form id="delete-form-{{ $role->id }}" method="post" action="{{ route('role.destroy', $role->id) }}" style="display: none;">

                {{ csrf_field() }}
                
                {{ method_field('DELETE') }}

              </form>

                <a href="" 
                onclick="if(confirm('Delete this Role???'))
                  {
                  event.preventDefault();document.getElementById('delete-form-{{ $role->id }}').submit();
                  }else
                  {
                  event.preventDefault();
                   }"> Delete <span class="glyphicon glyphicon-trash"></span> </a> 

                </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5"> <h4 class="text-center">  <strong> No Roles Available  </strong> </h4> </td>
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