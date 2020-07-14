<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    .logoutstyle{
    float: right;
    font-size: 20px;
    margin-top: -15px;
    margin-right: 22px;
}
    }
  </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  <!-- css create post -->
@yield('css')
 

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

     <ul class="navbar-nav ml-auto">
     	<li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                	 <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                   <i class="fa fa-user-md" aria-hidden="true"></i>
                                        @lang('translateproperties.userprofile')
                     </a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                     <i class="fa fa-sign-out" aria-hidden="true"></i>
                         @lang('translateproperties.logout')
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('public/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="height: calc(100vh - (3.5rem + 55px)) !important;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{get_gravatar(Auth::user()->email)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul id="menulist" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview {{ (request()->is('dashboard')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 @lang('translateproperties.dashboard')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.index')}}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('translateproperties.dashboard')</p>
                </a>
              </li>
            </ul>
          </li>



           <li id="tt" class="nav-item has-treeview {{ (request()->is('tags/create')) ||(request()->is('tags')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
            <i style="margin-right: 8px; margin-left:5px;"class="fa fa-tags" aria-hidden="true"></i>
              <p>
                @lang('translateproperties.t')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a id="addtag" href="{{route('tags.create')}}" class="nav-link {{ (request()->is('tags/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('translateproperties.addtag')</p>
                </a>
              </li>
           
              <li class="nav-item">
                <a href="{{route('tags.index')}}" class="nav-link {{ (request()->is('tags')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('translateproperties.t')</p>
                </a>
              </li>
          </ul>
      </li>


         
          <li id="ttt" class="nav-item has-treeview {{ (request()->is('posts/create')) ||(request()->is('posts')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                @lang('translateproperties.posts')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('posts.create')}}" class="nav-link {{ (request()->is('posts/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('translateproperties.addpost')</p>
                </a>
              </li>
           
              <li class="nav-item">
                <a href="{{route('posts.index')}}" class="nav-link {{ (request()->is('posts')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('translateproperties.posts')</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview {{ (request()->is('categories/create')) ||(request()->is('categories')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                @lang('translateproperties.category')
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories.create')}}" class="nav-link {{ (request()->is('categories/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('translateproperties.addcategory')</p>
                </a>
              </li>
           
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link {{ (request()->is('categories')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('translateproperties.category')</p>
                </a>
              </li>
          </ul>
      </li>

		@if(auth()->user()->isAdmin())
       <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link {{ (request()->is('users')) ? 'active' : '' }}">
            <i style="margin-right: 8px;margin-left: 5px;" class="fa fa-users" aria-hidden="true"></i>
              <p>
               @lang('translateproperties.users')
              </p>
            </a>
       </li>
      @endif

       <li class="nav-item">
            <a href="{{route('posts-trashed.index')}}" class="nav-link {{ (request()->is('trashed-post')) ? 'active' : '' }}">
              <i class="nav-icon fa fa-trash"></i>
              <p>
               @lang('translateproperties.trashpost')
              </p>
            </a>
       </li>



          <li class="nav-item has-treeview {{request()->is('tag/chart') || request()->is('post/chart') || request()->is('category/chart')? 'menu-open' : ''}}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                @lang('translateproperties.chart')
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tag.chart')}}" class="nav-link {{request()->is('tag/chart')? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('translateproperties.tagchart')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('post.chart')}}" class="nav-link {{request()->is('post/chart')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('translateproperties.postchart')</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('category.chart')}}" class="nav-link {{request()->is('category/chart')? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>@lang('translateproperties.categorychart')</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div>
    @if ( Config::get('app.locale') == 'en')
  
    <a  style="border-bottom: 0;border-top: 1px solid #4b545c;" id="btnbn" href="{{ url('locale/bn') }}" class="brand-link">

      <img src="{{asset('public/image/bn.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8; width: 50px;height: 30px;">
       
      <!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
    </a>
   
    
    @else
    <a style="border-bottom: 0;border-top: 1px solid #4b545c;"id="btnbn" href="{{ url('locale/en') }}" class="brand-link">
      <img src="{{asset('public/image/en.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8; width: 50px;height: 30px;">
     <!--  <span class="brand-text font-weight-light">AdminLTE 3</span> -->
    </a>


    @endif
    </div>
    <div class="logoutstyle">
           <a style="color: #c5aeae;" class="" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        @lang('translateproperties.logout')
            </a>
   </div>
    

  </aside>
   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
    </form>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  @if(session()->has('success'))
    <div class="alert alert-success">
      {{session()->get('success')}}
    </div>
  @endif

  @if(session()->has('error'))
    <div class="alert alert-danger">
      {{session()->get('error')}}
    </div>
  @endif
    @yield('content')
    
    </div>
    <footer style="position: fixed;bottom: 0;" class="main-footer">
    <strong>@lang('translateproperties.copyright') &copy; @lang('translateproperties.sal') <a href="{{url('/')}}">CMS</a>.</strong>
    @lang('translateproperties.allright')
    <div class="float-right d-none d-sm-inline-block">
      <b>@lang('translateproperties.version')</b> @lang('translateproperties.num')
    </div>
  </footer>
  <!-- /.content-wrapper -->


  
  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/dist/js/demo.js')}}"></script>
<script src="https://use.fontawesome.com/c1ea3167d7.js"></script>

@yield('scripts')
</body>
</html>
