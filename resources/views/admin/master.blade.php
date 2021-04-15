<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Indigenous People Registry Information System') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/plugins/datatables-buttons/css/buttons.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

   <!-- Sweet Alert -->
   <link rel="stylesheet" href="{{ asset('/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('/plugins/toastr/toastr.min.css') }}">

  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('/plugins/select2/css/select2.css') }}">
  <link rel="stylesheet" href="{{ asset('/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  @include('admin.navbar')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link navbar-success">
      <img src="{{ asset('image/doh.png') }}" alt="DOH Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light text-white">Western Visayas CHD12</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('image/crlogo.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Compensatory Record</a>
        </div>
      </div> -->

@include('admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    @yield('content')

</div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Indigenous People Regional Inter-Agency Committee  -</strong>
    Western Visayas • 2017
    <div class="float-right d-none d-sm-inline-block">
      <b>Powered by</b> <a href="https://adminlte.io">AdminLTE</a>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap --> 
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/jszip.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>

<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Toastr -->
<script src="{{ asset('/plugins/toastr/toastr.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('/plugins/select2/js/select2.full.min.js') }}"></script>

<!-- InputMask -->
<script src="{{ asset('/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('/plugins/inputmask/jquery.inputmask.min.js') }}"></script>

<!-- PAGE SCRIPTS -->
<!-- <script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script> -->

<!-- Philippine Standard Time -->
<!-- <script type="text/javascript" id="gwt-pst">
  (function(d, eId) {
    var js, gjs = d.getElementById(eId);
    js = d.createElement('script'); js.id = 'gwt-pst-jsdk';
    js.src = "//gwhs.i.gov.ph/pst/gwtpst.js?"+new Date().getTime();
    gjs.parentNode.insertBefore(js, gjs);
  }(document, 'gwt-pst'));
</script> -->

<script>
  $(function () {
    $('.confirm').on("submit", function(){
        return confirm("Click 'OK' to confirm action.");
    });

    $('.datemask').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });

    //Initialize Select2 Elements
    $('.select2').select2();

    $('#apply_date').select2();

    $('#apply_date').on("click", function(){
      $('#apply_date').prop("disabled", false);
    });
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    $('#iptbl').DataTable({
      dom: 'Bfrtip',
        buttons: [
          {
            extend: 'excelHtml5',
            title: 'DOH WV CHD Compensatory Record - List of Duties',
            exportOptions: {
                columns: [0,1,2,3,4]
            }					
          },
          {
            extend: 'print',
            title: "DOH WV CHD Compensatory Record - List of Duties",
            exportOptions: {
                columns: [0,1,2,3,4]
            },
            // lanscape orientation
            customize: function(win)
            {
  
                var last = null;
                var current = null;
                var bod = [];
  
                var css = '@page { size: landscape; }',
                    head = win.document.head || win.document.getElementsByTagName('head')[0],
                    style = win.document.createElement('style');
  
                style.type = 'text/css';
                style.media = 'print';
  
                if (style.styleSheet)
                {
                  style.styleSheet.cssText = css;
                }
                else
                {
                  style.appendChild(win.document.createTextNode(css));
                }
  
                head.appendChild(style);
            }
          }
        ],
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "stateSave": true,
    });
    
    $('#region').change(function(){
      var region = $('#region').val();

      $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.get('{!! route('getProvince') !!}', {
          region:region,
      },function(data){
          $('#province').html(data);
      });          
    });
    
    $('#province').change(function(){
      var province = $('#province').val();

      $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.get('{!! route('getMunicipality') !!}', {
          province:province,
      },function(data){
          $('#municipality').html(data);
      });          
    });

    $('#municipality').change(function(){
      var municipality = $('#municipality').val();

      $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.get('{!! route('getBarangay') !!}', {
          municipality:municipality,
      },function(data){
          $('#barangay').html(data);
      });          
    });

    $('#barangay').change(function(){
      var barangay = $('#barangay').val();

      $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.get('{!! route('getLeader') !!}', {
          barangay:barangay,
      },function(data){
          $('#leader').html(data);
      });          
    });

    $('#community').change(function(){
      var community = $('#community').val();

      $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.get('{!! route('getHead') !!}', {
          community:community,
      },function(data){
        $('#head').html(data);
      });          
    });

  });
</script>

<script>
    @if(Session::has('message'))
        var type = "{{Session::get('alert-type', 'success')}}";

        switch(type){
          case 'success':
            toastr.success("{{ Session::get('message') }}",
              toastr.options = {
                "closeButton": true,
                "positionClass": "toast-top-right"
              }
            );
            break;
          case 'error':
            toastr.error("{{ Session::get('message') }}",
              toastr.options = {
                "closeButton": true,
                "positionClass": "toast-top-right"
              }
            );
            break;
            case 'info':
            toastr.info("{{ Session::get('message') }}",
              toastr.options = {
                "positionClass": "toast-top-right"
              }
            );
            break;
        }

    @endif
</script>

</body>
</html>
