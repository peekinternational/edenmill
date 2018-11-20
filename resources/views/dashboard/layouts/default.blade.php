<!DOCTYPE html>
<html>
@include('dashboard.partials.head')
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @include('dashboard.partials.header')
    <!-- Left side column. contains the sidebar -->
    @include('dashboard.partials.left_sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('dashboard.partials.content_header')
        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('dashboard.partials.footer')
    <!-- Control Sidebar -->
    @include('dashboard.partials.right_sidebar')
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('dashboard.partials.footer_script')
@yield('footer')
</body>
</html>
