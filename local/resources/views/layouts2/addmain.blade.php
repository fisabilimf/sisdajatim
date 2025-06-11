<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dinas Pekerjaan Umum Sumber Daya Air Provinsi Jawa Timur</title>
    <link rel="icon" type="image/ico" href='{{asset("asset/main/images/gres.png")}}'/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
     
    <link rel="stylesheet" href="{{asset("asset/admin/bootstrap/css/bootstrap.css")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("asset/admin/bootstrap/css/fontawesome-all.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset("asset/admin/bootstrap/css/ionicons.min.css")}}">
     <link rel="stylesheet" href="{{asset("asset/admin/fancybox/dist/jquery.fancybox.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("asset/admin/dist/css/AdminLTE.css")}}">
    <link rel="stylesheet" href="{{asset("asset/admin/dist/css/zebrapic.css")}}">
    <link rel="stylesheet" href="{{asset("asset/admin/dist/css/bootstrap-fileupload.css")}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset("asset/admin/dist/css/skins/_all-skins.min.css")}}">
    <!-- iCheck -->
        <link rel="stylesheet" href="{{asset("asset/admin/plugins/iCheck/minimal/_all.css")}}">
    <link rel="stylesheet" href="{{asset("asset/admin/plugins/iCheck/flat/blue.css")}}">
 <link rel="stylesheet" href="{{asset("asset/admin/plugins/select2/select2.min.css")}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset("asset/admin/plugins/morris/morris.css")}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset("asset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css")}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset("asset/admin/plugins/datepicker/datepicker3.css")}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset("asset/admin/plugins/daterangepicker/daterangepicker-bs3.css")}}">
    <!-- bootstrap wysihtml5 - text editor -->

     <link rel="stylesheet" href="{{asset("asset/admin/plugins/datatables/dataTables.bootstrap.css")}}">
     <link rel="stylesheet" href="{{asset("asset/admin/ckeditor/bootstrap-wysihtml5.css")}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>P</b>U</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sumber Daya Air</b> Jatim</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
    
      </header>
      <!-- Left side column. contains the logo and sidebar -->
    

      <!-- Content Wrapper. Contains page content -->
    
        <!-- Content Header (Page header) -->
      

        <!-- Main content -->
       @yield('body')
  
    

      <!-- Control Sidebar -->
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{asset("asset/admin/plugins/jQuery/jQuery-2.1.4.min.js")}}"></script>
    <!-- jQuery UI 1.11.4 -->
         <script type="text/javascript">


      $('.revisi_data').on('click',function () 
        {
          $(".panel-group.revisi").show();
        });
       $('.revisi_batal').on('click',function () 
        {
          $(".panel-group.revisi").hide();
        });

         $('.pengganti_data').on('click',function () 
        {
          $(".panel-body.pengganti").show();
        });
       $('.pengganti_batal').on('click',function () 
        {
          $(".panel-body.pengganti").hide();
        });
        

    </script>
    <script src="{{asset("asset/admin/bootstrap/js/jquery-ui.min.js")}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->

    <script src="{{asset("asset/admin/bootstrap/js/bootstrap.min.js")}}"></script>
      <script src="{{asset("asset/admin/fancybox/dist/jquery.fancybox.js")}}"></script>
      <script>
   $('.fancybox').fancybox();
    $('.fanlapor').fancybox({
'width'       : '90%',
        'height'      : '100%',
        'autoScale'     : false,
        'transitionIn'    : 'none',
        'transitionOut'   : 'none',
        'type'        : 'iframe'});

     $('.fanphoto').fancybox({
'width'       : '60%',
        'height'      : '100%',
        'autoScale'     : false,
        'transitionIn'    : 'none',
        'transitionOut'   : 'none',
        'type'        : 'iframe'});
   
   
</script>
    <!-- Morris.js charts -->

    <script src="{{asset("asset/admin/bootstrap/js/raphael-min.js")}}"></script>

    <script src="{{asset("asset/admin/plugins/morris/morris.min.js")}}"></script>
    <!-- Sparkline -->
    <script src="{{asset("asset/admin/plugins/sparkline/jquery.sparkline.min.js")}}"></script>
    <!-- jvectormap -->
    <script src="{{asset("asset/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}"></script>
    <script src="{{asset("asset/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset("asset/admin/plugins/knob/jquery.knob.js")}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset("asset/admin/bootstrap/js/moment.min.js")}}"></script>
    <script src="{{asset("asset/admin/plugins/daterangepicker/daterangepicker.js")}}"></script>
    <!-- datepicker -->
    <script src="{{asset("asset/admin/plugins/datepicker/bootstrap-datepicker.js")}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
  
    <!-- Slimscroll -->
    <script src="{{asset("asset/admin/plugins/slimScroll/jquery.slimscroll.min.js")}}"></script>
     <script src="{{asset("asset/admin/plugins/iCheck/icheck.min.js")}}"></script>
    <!-- FastClick -->
    <script src="{{asset("asset/admin/plugins/fastclick/fastclick.min.js")}}"></script>
     <script src="{{asset("asset/admin/plugins/select2/select2.full.min.js")}}"></script>
    <!-- AdminLTE App -->

    <script src="{{asset("asset/admin/dist/js/app.min.js")}}"></script>
     <script src="{{asset("asset/admin/dist/js/zebra_datepicker.js")}}"></script>
     <script src="{{asset("asset/admin/dist/js/bootstrap-fileupload.js")}}"></script>

     <script src="{{asset("asset/admin/plugins/datatables/jquery.dataTables.min.js")}}"></script>
         <script src="{{asset("asset/admin/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
     
         <script>

           $('.tanggal').Zebra_DatePicker({
            format: 'd-m-Y',
            months : ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
            days : ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu'],
            days_abbr : ['Minggu','Senin','Selasa','Rabu','Kamis','Jum\'at','Sabtu']
        });
           $(".select2").select2();
           $('#reservation').daterangepicker({format:'YYYY-MM-DD'});
           $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "paging":false
      
      
        });
      });
    </script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  
    <script src="{{asset("asset/admin/dist/js/pages/dashboard.js")}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset("asset/admin/dist/js/demo.js")}}"></script>
     <script src="{{asset("asset/admin/ckeditor/ckeditor.js")}}"></script>
     <script src="{{asset("asset/admin/ckeditor/adapters/jquery.js")}}"></script>
     <script>

  // CKEditor
  jQuery('#ckeditor').ckeditor();

  
  jQuery('#inlineedit1, #inlineedit2').ckeditor();
  
  // Uncomment the following code to test the "Timeout Loading Method".
  // CKEDITOR.loadFullCoreTimeout = 5;

  window.onload = function() {
  // Listen to the double click event.
  if ( window.addEventListener )
  document.body.addEventListener( 'dblclick', onDoubleClick, false );
  else if ( window.attachEvent )
  document.body.attachEvent( 'ondblclick', onDoubleClick );
  };

  function onDoubleClick( ev ) {
  // Get the element which fired the event. This is not necessarily the
  // element to which the event has been attached.
  var element = ev.target || ev.srcElement;

  // Find out the div that holds this element.
  var name;

  do {
    element = element.parentNode;
  }
  while ( element && ( name = element.nodeName.toLowerCase() ) &&
    ( name != 'div' || element.className.indexOf( 'editable' ) == -1 ) && name != 'body' );

  if ( name == 'div' && element.className.indexOf( 'editable' ) != -1 )
    replaceDiv( element );
  };

  var editor;

  function replaceDiv( div ) {
    if ( editor )
      editor.destroy();
    editor = CKEDITOR.replace( div );
  };
     </script>
    
  </body>
</html>
