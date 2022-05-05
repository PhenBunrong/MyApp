
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Dashboard</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/moment/moment.min.js')}}">
<link rel="stylesheet" href="{{asset('admin/dist/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css?v=3.2.0')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">


<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->

<link rel="stylesheet" href="../../">
<link rel="stylesheet" href="../../">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div> -->

@include('admin.include.navbar')

@include('admin.include.sidebar')
@include('admin.include.alert')


<div class="content-wrapper">

    @yield('content')

</div>

<footer class="main-footer">
<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
<b>Version</b> 3.2.0
</div>
</footer>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>


<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>

<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>

<script src="{{asset('admin/plugins/sparklines/sparkline.js')}}"></script>


<script src="{{asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script src="{{asset('admin/dist/js/adminlte.js?v=3.2.0')}}"></script>

<!-- <script src="{{asset('admin/dist/js/demo.js')}}"></script> -->

{{-- <script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script> --}}


<script src="{{asset('admin/dist/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

@yield('js')
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>
</body>
</html>
