<!DOCTYPE html>
<html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('adminAsset')}}/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('adminAsset')}}/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/vendors/css/charts/apexcharts.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/css/colors.css">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/css/plugins/extensions/ext-component-toastr.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->

@include('admin.section.header')

<!-- END: Header-->


<!-- BEGIN: Main Menu-->
@include('admin.section.leftSideBar')
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    @yield('content')
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>




<!-- BEGIN: Vendor JS-->
<script src="{{asset('adminAsset')}}/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('adminAsset')}}/vendors/js/charts/apexcharts.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('adminAsset')}}/js/core/app-menu.js"></script>
<script src="{{asset('adminAsset')}}/js/core/app.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('adminAsset')}}/js/scripts/pages/dashboard-ecommerce.js"></script>
<!-- END: Page JS-->

<!-- Sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>
<!-- END: Body-->

</html>
