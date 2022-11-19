<!-- - var navbarShadow = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>Dashboard | {{ auth()->user()->name }}</title>
  <link rel="apple-touch-icon" href="{{ asset('assets/home/app-assets/images/ico/apple-icon-120.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/home/app-assets/images/ico/favicon.ico') }}">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/app-assets/css/vendors.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css') }}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/app-assets/css/app.css') }}">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/app-assets/css/core/colors/palette-gradient.css') }}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/assets/css/style.css') }}">
  <!-- END Custom CSS-->
  <style>
    body.vertical-layout.vertical-menu.menu-collapsed .main-menu .navigation > li > a > span{
      display: none !important;
    }
  </style>
</head>
<body class="vertical-layout vertical-menu 2-columns  menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-semi-light bg-gradient-x-grey-blue">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo" alt="stack admin logo" src="{{ asset('assets/home/app-assets/images/logo/stack-logo.png') }}">
              <h2 class="brand-text">MANPRO</h2>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
              <div class="search-input">
                <input class="input" type="text" placeholder="Explore Stack...">
              </div>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="avatar avatar-online">
                  <img src="{{ asset('assets/home/app-assets/images/portrait/small/avatar1.png') }}" alt="avatar"><i></i></span>
                <span class="user-name"> Welcome, {{ auth()->user()->name }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="/editprofil"><i class="ft-user"></i> Edit Profile</a>
                <div class="dropdown-divider"></div>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="ft-power"></i> Logout</button>
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" navigation-header">
          <span>Intive Studio</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
          data-original-title="General"></i>
        </li>
        <li class=" nav-item {{ Request::is('dashboardmain') ? 'active' : '' }}"><a href="/dashboardmain"><i class="ft-home"></i><span>Home</span></a>
        </li>
        @can('admin')
        <li class=" nav-item"><a href="#"><i class="ft-monitor"></i><span class="menu-title" data-i18n="">Data Master</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="/manajer/karyawan">Karyawan</a>
            </li>
            {{-- <li><a class="menu-item" href="/manajer/klien">Klien</a>
            </li> --}}
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="ft-monitor"></i><span class="menu-title" data-i18n="">Initiating Process</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="/manajer/charter">Project Charter</a>
            </li>
            <li><a class="menu-item" href="/manajer/klien">Identify Stakeholder</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="ft-monitor"></i><span class="menu-title" data-i18n="">Planning Process</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="/manajer/project">Project Plan</a>
            </li>
            <li><a class="menu-item" href="/manajer/scope">Plan Scope</a>
            </li>
            <li><a class="menu-item" href="/manajer/ganchart">Plan Schedule</a>
            </li>
            <li><a class="menu-item" href="/manajer/cost">Plan Cost</a>
            </li>
            <li><a class="menu-item" href="/manajer/wbs">WBS</a>
            </li>
            <li><a class="menu-item" href="/manajer/planstakeholder">Plan Stakeholder</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="ft-monitor"></i><span class="menu-title" data-i18n="">Executing Process</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="/manajer/work">Manage Work</a>
            </li>
            <li><a class="menu-item" href="/manajer/knowledge">Manage Knowledge</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="ft-monitor"></i><span class="menu-title" data-i18n="">Monitoring Process</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="/manajer/stakeholder">Monitoring Stakeholder</a>
            </li>
            <li><a class="menu-item" href="/manajer/progress">Monitoring Project Work</a>
            </li>
            <li><a class="menu-item" href="/progressall">Perform Integrate Change</a>
            </li>
            <li><a class="menu-item" href="/manajer/con-scope">Control Scope</a>
            </li>
            <li><a class="menu-item" href="/manajer/con-schedule">Control Schedule</a>
            </li>
            <li><a class="menu-item" href="/manajer/con-cost">Control Cost</a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="ft-monitor"></i><span class="menu-title" data-i18n="">Clossing Process</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="/manajer/close">Clossing</a>
            </li>
        </li>
        @endcan
      </ul>
    </div>
  </div>

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row"></div>
        <div class ="container-body">
         @yield('container')
        </div>
    </div>
  </div>


  <footer class="footer footer-static footer-dark navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2022 <a class="text-bold-800 grey darken-2" href="https://intivestudio.com/"
        target="_blank">PT. TEKNO MANDALA KREATIF </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('assets/home/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ asset('assets/home/app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/home/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="{{ asset('assets/home/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/home/app-assets/js/core/app.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/home/app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{ asset('assets/home/app-assets/js/scripts/tables/datatables/datatable-api.js') }}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->

  <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
  <script src="{{ asset('') }}/bootstrap/js/popper.min.js"></script>
  <script src="{{ asset('') }}/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{ asset('') }}/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="{{ asset('') }}/assets/jss/app.js"></script>
  <script>
      $(document).ready(function() {
          // App.init();
          $('.table').DataTable();
      });
  </script>
  <script src="{{ asset('') }}/assets/jss/custom.js"></script>
  @yield('script')
  <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script src="/plugins/fullcalendar/moment.min.js"></script>
    <script src="/plugins/flatpickr/flatpickr.js"></script>
    <script src="/plugins/fullcalendar/fullcalendar.min.js"></script>

    {{-- <script src="/plugins/fullcalendar/custom-fullcalendar.advance.js"></script> --}}
    <script src="/plugins/fullcalendar/milestone.js"></script>
    <script src="/plugins/apex/apexcharts.min.js"></script>
    <script src="/assets/js/dashboard/dash_1.js"></script>
</body>
</html>