 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{  asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Mr Ofu</p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">ADMIN NAVIGATION</li>
      
        <li class="active treeview">
        <!--  <a href="#">
            <i class="fa fa-dashboard"></i> <span>Blog</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        -->
  <li class="{{  Request::url() == route('post.index')?  'active' : ''}}">
    <a href="{{ route('post.index' )}}"><i class="fa fa-circle-o"></i> Posts </a>
  </li>

  @can('posts.category', Auth::user())
  <li class="{{  Request::url() == route('category.index')?  'active' : ''}}">
  <a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Categories </a>
  </li>
  @endcan

  @can('posts.tag', Auth::user())
  <li class="{{  Request::url() == route('tag.index')?  'active' : ''}}"> 
   <a href="{{ route('tag.index') }}"><i class="fa fa-circle-o"></i> Tags </a>
  </li>
  @endcan
  
  
  @can('admins.super', Auth::user())
   <li class="{{  Request::url() == route('user.index')?  'active' : ''}}">
    <a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> Users </a>
  </li>
  
  <li class="{{  Request::url() == route('role.index')?  'active' : ''}}">
      <a href="{{ route('role.index') }}"><i class="fa fa-circle-o"></i> Roles </a>
  </li>
  
   <li class="{{  Request::url() == route('permission.index')?  'active' : ''}}">
    <a href="{{ route('permission.index') }}"><i class="fa fa-circle-o"></i> Permissions </a>
  </li>
  @endcan


        </li>

    


     
    </section>
    <!-- /.sidebar -->
  </aside>