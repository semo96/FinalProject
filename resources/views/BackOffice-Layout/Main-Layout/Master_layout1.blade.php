<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page_title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="image/png" href={{asset('BackOffice-Assets/dist/img/logo.png')}} >
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href={{asset('BackOffice-Assets/bootstrap/css/bootstrap-rtl.min.css')}}>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href= {{asset('BackOffice-Assets/dist/fonts/font-awesome/css/font-awesome.min.css')}} >
    <link rel="stylesheet" href={{asset('BackOffice-Assets/dist/fonts/font-awesome/css/font-awesome.css')}}>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href= {{asset('BackOffice-Assets/plugins/fullcalendar/fullcalendar.min.css')}}>
    <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href={{asset('BackOffice-Assets/dist/css/AdminLTE-rtl.min.css')}}>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href= {{asset('BackOffice-Assets/dist/css/skins/_all-skins-rtl.min.css')}}>
    <!-- iCheck -->
    <link rel="stylesheet" href={{asset('BackOffice-Assets/plugins/iCheck/flat/blue.css')}}>
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href={{asset('BackOffice-Assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}>
    <!-- data table CSS  = -->
    <script type="text/javascript" src={{asset('BackOffice-Assets/dist/js/table_pagination/paginate.js')}}></script>
    <!-- Date Picker -->
    <link rel="stylesheet" href={{asset('BackOffice-Assets/plugins/datepicker/datepicker3.css')}}>
    <!-- Morris chart -->
    <link rel="stylesheet" {{asset('BackOffice-Assets/plugins/morris/morris.css')}}>
    <!-- dialog CSS -->
    <link rel="stylesheet" href={{asset('BackOffice-Assets/dist/css/dialog/sweetalert2.min.css')}}>
    <link rel="stylesheet" href={{asset('BackOffice-Assets/dist/css/dialog/dialog.css')}}>
    <!-- jvectormap -->
    <link rel="stylesheet" href={{asset('BackOffice-Assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}>
    <!-- google font CSS  = -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Changa:400,700&display=swap" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Changa&display=swap" rel="stylesheet">
    <!--<link href="https://fonts.googleapis.com/css?family=Changa:400,700&display=swap" rel="stylesheet">-->

    <!-- my style -->
    <link rel="stylesheet" href={{asset('BackOffice-Assets/dist/css/My_own_style/my_style.css')}}>
    <!-- map style -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
          integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
          crossorigin=""/>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
            integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
            crossorigin=""></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--Multi select jquery-->

    <link href={{asset('BackOffice-Assets/dist/fSelect.css')}} rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src={{asset('BackOffice-Assets/dist/fSelect.js')}}></script>
    <script>
        (function($) {
            $(function() {
                window.fs_test = $('.test').fSelect({
                    placeholder: 'العميل',
                    numDisplayed: 3,
                    overflowText: '{n} selected',
                    noResultsText: 'No results found',
                    searchText: 'Search',
                    showSearch: true
                } );
            });
        })(jQuery);
    </script>


<!--Leaflet Library-->
<script src="{{asset('leaflet/libs/leaflet-src.js')}}"></script>
<link rel="stylesheet" href="{{asset('leaflet/libs/leaflet.css')}}"/>

  <script src="{{asset('leaflet/src/Leaflet.draw.js')}}"></script>
  <script src="{{asset('leaflet/src/Leaflet.Draw.Event.js')}}"></script>
  <link rel="stylesheet" href="{{asset('leaflet/src/leaflet.draw.css')}}"/>

  <script src="{{asset('leaflet/src/Toolbar.js')}}"></script>
  <script src="{{asset('leaflet/src/Tooltip.js')}}"></script>

  <script src="{{asset('leaflet/src/ext/GeometryUtil.js')}}"></script>
  <script src="{{asset('leaflet/src/ext/LatLngUtil.js')}}"></script>
  <script src="{{asset('leaflet/src/ext/LineUtil.Intersect.js')}}"></script>
  <script src="{{asset('leaflet/src/ext/Polygon.Intersect.js')}}"></script>
  <script src="{{asset('leaflet/src/ext/Polyline.Intersect.js')}}"></script>
  <script src="{{asset('leaflet/src/ext/TouchEvents.js')}}"></script>

  <script src="{{asset('leaflet/src/draw/DrawToolbar.js')}}"></script>
  <script src="{{asset('leaflet/src/draw/handler/Draw.Feature.js')}}"></script>
  <script src="{{asset('leaflet/src/draw/handler/Draw.SimpleShape.js')}}"></script>
  <script src="{{asset('leaflet/src/draw/handler/Draw.Polyline.js')}}"></script>
  <script src="{{asset('leaflet/src/draw/handler/Draw.Marker.js')}}"></script>
  <script src="{{asset('leaflet/src/draw/handler/Draw.Circle.js')}}"></script>
  <script src="{{asset('leaflet/src/draw/handler/Draw.CircleMarker.js')}}"></script>
  <script src="{{asset('leaflet/src/draw/handler/Draw.Polygon.js')}}"></script>
  <script src="{{asset('leaflet/src/draw/handler/Draw.Rectangle.js')}}"></script>


  <script src="{{asset('leaflet/src/edit/EditToolbar.js')}}"></script>
  <script src="{{asset('leaflet/src/edit/handler/EditToolbar.Edit.js')}}"></script>
  <script src="{{asset('leaflet/src/edit/handler/EditToolbar.Delete.js')}}"></script>

  <script src="{{asset('leaflet/src/Control.Draw.js')}}"></script>

  <script src="{{asset('leaflet/src/edit/handler/Edit.Poly.js')}}"></script>
  <script src="{{asset('leaflet/src/edit/handler/Edit.SimpleShape.js')}}"></script>
  <script src="{{asset('leaflet/src/edit/handler/Edit.Rectangle.js')}}"></script>
  <script src="{{asset('leaflet/src/edit/handler/Edit.Marker.js')}}"></script>
  <script src="{{asset('leaflet/src/edit/handler/Edit.CircleMarker.js')}}"></script>
  <script src="{{asset('leaflet/src/edit/handler/Edit.Circle.js')}}"></script>
<!--get data from Geojson file -->
  <script src="{{asset('leaflet/data/Yemen_GeoJson_Data.json')}}"></script>

<!--search-->
<link rel="stylesheet" href="{{asset('leaflet/search/src/leaflet-search.css')}}" />
<link rel="stylesheet" href="{{asset('leaflet/search/src/leaflet-search.mobile.css')}}" />
<link rel="stylesheet" href="{{asset('leaflet/search/style.css')}}" />
<link rel="stylesheet" href="{{asset('leaflet/search/mobile.css')}}" />

<!--print -->
	<link href='http://fonts.googleapis.com/css?family=Lato:900,300' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">




</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b style="color:rgb(255, 255, 255)">P</b><b style="color:rgb(252, 96, 6)">B</b></span>
            <!-- logo for regular state and mobile devices -->
            <h4 id="logo_name"><span class="logo-lg"><b id="logo-first-part">Performance  </b><span id="logo-sec-part">Booster</span></span></h4>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">لديك <span>4</span> رسائل</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-right">
                                                <img src={{asset('BackOffice-Assets/dist/img/user2-160x160.jpg')}} class="img-circle" alt="User Image">
                                            </div>
                                            <h5>
                                                العميل محمد علي
                                                <small style="font-size:15px; "> 1/2/2020</small>
                                            </h5>
                                            <p>رسالة جديدة من العميل</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer"><a href="{{route('customer.index')}}" target="_blank">عرض كل الرسائل</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <!-- Notifications: make this dynaminc by php -->
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">لديك <span>10</span> اشعارات</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#" target="_blank">
                                            <h5>
                                                <i class="fa fa-bell" style="color:#fc6006;"></i>
                                                5
                                                <span>فواتير </span>
                                                من المندوب
                                                <span>خالد علي </span>
                                            </h5>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="{{route('notification_page')}}" target="_blank">عرض الكل</a></li>
                        </ul>
                    </li>
                    <!--refresh:    style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#">
                            <i class="fa fa-refresh"></i>
                        </a>

                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src={{asset('BackOffice-Assets/dist/img/user2-160x160.jpg')}} class="user-image" alt="User Image">
                            <span class="hidden-xs">علي خالد</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src={{asset('BackOffice-Assets/dist/img/user2-160x160.jpg')}} class="img-circle" alt="User Image">

                                <p>
                                    علي خالد
                                    <small>مشرف مناديب</small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{route('edit_profile')}}" class="btn btn-default btn-flat" target="_blank">الملف الشخصي</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('logout')}}" class="btn btn-default btn-flat" target="_blank" >تسجيل الخروج</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel ">
                <!--________________________ logo image ______________________________-->
                <div id="logo_img">
                    <img src={{asset('BackOffice-Assets/dist/img/now-logo.png')}} class="logo-circle" alt="logo Image">
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">لوحة التحكم</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-home"></i> <span>الصفحة الرئيسية</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('index')}}" target="_blank"><i class="fa fa-circle-o"></i>صفحة المراقبة</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-group"></i>
                        <span>طلبات العملاء</span>
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('reg_Cus_order')}}" target="_blank"><i class="fa fa-circle-o"></i>انشاء طلب لعميل مسجل </a></li>
                        <li><a href="{{route('Unreg_Cus_order')}}" target="_blank"><i class="fa fa-circle-o"></i>انشاء طلب لعميل غير مسجل </a></li>
                        <li><a href="{{route('orders_list')}}" target="_blank"><i class="fa fa-circle-o"></i>قائمة الطلبات</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>المهام</span>
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('task.create')}}" target="_blank"><i class="fa  fa-circle-o "></i>انشاء مهمة </a></li>
                        <li><a href="{{route('task.index')}}" target="_blank"><i class="fa fa-circle-o"></i> قائمة المهام المنشأه</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-product-hunt"></i>
                        <span>المنتجات</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('products_list')}}" target="_blank"><i class="fa fa-circle-o"></i> قائمة المنتجات</a></li>
                        <li><a href="{{route('category_list')}} " target="_blank"><i class="fa fa-circle-o"></i> قائمة الأصناف</a></li>
                        <li><a href=" {{route('prices_list')}}" target="_blank"><i class="fa fa-circle-o"></i> قائمة الأسعار</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa  fa-truck"></i>
                        <span>مندوبي المبيعات</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('SP_Data.create')}}" target="_blank"><i class="fa fa-circle-o"></i> بيانات المندوب</a></li>
                        <li><a href="{{route('sp_portfolio')}}" target="_blank"><i class="fa fa-circle-o"></i> وثائق المناديب</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>العملاء</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('customer.create')}}" target="_blank"><i class="fa fa-circle-o"></i> اظافة عميل</a></li>
                        <li><a href="{{route('customer.index')}}" target="_blank"><i class="fa fa-circle-o"></i>قائمة العملاء</a></li>
                        <li><a href="{{route('feedback.index')}}" target="_blank"><i class="fa fa-circle-o"></i> التغذية الراجعةFeedBack</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-star"></i> <span>العروض</span>
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('offer.create')}}" target="_blank"><i class="fa fa-circle-o"></i>انشاء عرض</a></li>
                        <li><a href="{{route('offer.index')}}" target="_blank"><i class="fa fa-circle-o"></i>قائمة العروض</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-list-alt"></i> <span>التقارير</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('tasks_report')}}" target="_blank"><i class="fa fa-circle-o"></i>تقرير عن مهام المناديب</a></li>
                        <li><a href="{{route('orders_report')}}" target="_blank"><i class="fa fa-circle-o"></i>تقرير عن طلبات العملاء </a></li>
                        <li><a href="{{route('charts_report')}}" target="_blank"><i class="fa fa-circle-o"></i>تقرير المخططات </a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa  fa-cogs"></i> <span>الاعدادات</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('edit_profile')}}" target="_blank"><i class="fa fa-circle-o"></i>تعديل الملف الشخصي</a></li>

                    </ul>
                </li>
                <li class="header">اداء الافضل</li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">

            @yield('content')
        </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        كل الحقوق محفوظة لدى
        <strong > &copy;<a href="#"> <span class="logo-lg"><b style="color:rgb(94, 92, 91)">
     Performance</b><span style="color:rgb(252, 96, 6)">Booster</span></span>
            </a></strong>
    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src={{asset('BackOffice-Assets/plugins/jQuery/jquery-2.2.3.min.js')}}></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src={{asset('BackOffice-Assets/bootstrap/js/bootstrap-rtl.min.js')}}></script>
<!-- Slimscroll -->
<script src={{asset('BackOffice-Assets/plugins/slimScroll/jquery.slimscroll.min.js')}}></script>
<!-- FastClick -->
<script src={{asset('BackOffice-Assets/plugins/fastclick/fastclick.js')}}></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('BackOffice-Assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('BackOffice-Assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('BackOffice-Assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('BackOffice-Assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('BackOffice-Assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!--  dialogs JS -->
<script src="{{asset('BackOffice-Assets/dist/js/dialog/sweetalert2.min.js')}}"></script>
<script src="{{asset('BackOffice-Assets/dist/js/dialog/dialog-active.js')}}"></script>
<!-- datapicker JS -->
<script src="{{asset('BackOffice-Assets/dist/js/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('BackOffice-Assets/dist/js/datapicker/datepicker-active.js')}}"></script>
<script src={{asset('BackOffice-Assets/dist/js/rpie.js')}}></script>
<!-- AdminLTE App -->
<script src={{asset('BackOffice-Assets/dist/js/app.min.js')}}></script>
<!-- AdminLTE for demo purposes -->
<script src={{asset('BackOffice-Assets/dist/js/demo.js')}}></script>
<!-- Tabs -->

<!-- iCheck -->
<script src={{asset('BackOffice-Assets/plugins/iCheck/icheck.min.js')}}></script>
<!-- Bootstrap WYSIHTML5 -->
<script src={{asset('BackOffice-Assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}></script>
<!-- Page Script -->
<script>
    $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
    });
</script>
<!-- data table   JS -->
<script>
    let options = {
        numberPerPage:10, //Cantidad de datos por pagina
        goBar:false, //Barra donde puedes digitar el numero de la pagina al que quiere ir
        pageCounter:true, //Contador de paginas, en cual estas, de cuantas paginas
    };

    let filterOptions = {
        el:'#searchBox' //Caja de texto para filtrar, puede ser una clase o un ID
    };

    paginate.init('.myTable',options,filterOptions);
</script>
<!-- progress bar   JS -->
<script src={{asset('BackOffice-Assets/dist/js/jquery.barfiller.js')}} type="text/javascript"></script>
<script type="text/javascript">

    $(document).ready(function(){

        $('#bar1').barfiller();

    });

</script>
<!--  choose offer type -->
<script>
    function choose_offer_type(x){
        if(x==0){
            document.getElementById('product_offer').style.display='block';
            document.getElementById('discount_offer').style.display='none';
        }else{
            document.getElementById('discount_offer').style.display='block';
            document.getElementById('product_offer').style.display='none';
        }

        return;

    }
</script>
<!--map script-->
<script>
    var mymap = L.map('map').setView([15.369445, 44.191006], 13);
    const attribution =
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';
    const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    const tiles = L.tileLayer(tileUrl, { attribution });
    tiles.addTo(mymap);
    const marker = L.marker([lat, lon]).addTo(mymap);
</script>

<script type="text/javascript">

    var obj = {
        values: [10, 10, 10, 30, 10,.5,9.5,5,5,5,5],
        colors: ['#4CAF50', '#00BCD4', '#E91E63', '#FFC107', '#9E9E9E','rgb(85, 57, 67)','rgb(166, 212, 0)','rgb(118, 148, 9)','rgb(181, 247, 184)','rgb(255, 169, 201)','rgb(202, 250, 8)'],
        animation: true, // Takes boolean value & default behavious is false
        animationSpeed: 50, // Time in miliisecond & default animation speed is 20ms
        fillTextData: true, // Takes boolean value & text is not generate by default
        fillTextColor: '#fff', // For Text colour & default colour is #fff (White)
        fillTextAlign: 1.30, // for alignment of inner text position i.e. higher values gives closer view to center & default text alignment is 1.85 i.e closer to center
        fillTextPosition: 'inner', // 'horizontal' or 'vertical' or 'inner' & default text position is 'horizontal' position i.e. outside the canvas
        doughnutHoleSize: 50, // Percentage of doughnut size within the canvas & default doughnut size is null
        doughnutHoleColor: '#fff', // For doughnut colour & default colour is #fff (White)
        offset: 1, // Offeset between two segments & default value is null
        pie: 'normal', // if the pie graph is single stroke then we will add the object key as "stroke" & default is normal as simple as pie graph
        isStrokePie: {
            stroke: 20, // Define the stroke of pie graph. It takes number value & default value is 20
            overlayStroke: true, // Define the background stroke within pie graph. It takes boolean value & default value is false
            overlayStrokeColor: '#eee', // Define the background stroke colour within pie graph & default value is #eee (Grey)
            strokeStartEndPoints: 'Yes', // Define the start and end point of pie graph & default value is No
            strokeAnimation: true, // Used for animation. It takes boolean value & default value is true
            strokeAnimationSpeed: 40, // Used for animation speed in miliisecond. It takes number & default value is 20ms
            fontSize: '50px', // Used to define text font size & default value is 60px
            textAlignement: 'center', // Used for position of text within the pie graph & default value is 'center'
            fontFamily: 'Arial', // Define the text font family & the default value is 'Arial'
            fontWeight: 'bold' //  Define the font weight of the text & the default value is 'bold'
        }
    };

    //Generate myCanvas
    generatePieGraph('myCanvas', obj);
</script>


</body>
</html>
