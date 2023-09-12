<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel=icon href="{{asset('frontendAsset')}}/img/favicon.png" sizes="20x20" type="image/png">

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/css/flaticon.min.css">
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/css/nice-select.min.css">
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/css/magnific.min.css">
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/css/spacing.min.css">
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/css/slick.min.css">
    <link rel="stylesheet" href="{{asset('frontendAsset')}}/css/style.css">
</head>

<body class='sc5'>

<!-- preloader area start -->
@include('frontend.section.preloader')
<!-- preloader area end -->

<!-- search popup start-->
@include('frontend.section.search')
<!-- search popup end-->
<div class="body-overlay" id="body-overlay"></div>

<!-- navbar start -->
@include('frontend.section.top_nav')
@include('frontend.section.navbar')
<!-- navbar end -->

@yield('content')


<!-- footer area start -->
@include('frontend.section.footer')
<!-- footer area end -->

<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->

<!-- toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- all plugins here -->
<script src="{{asset('frontendAsset')}}/js/jquery.min.js"></script>
<script src="{{asset('frontendAsset')}}/js/bootstrap.min.js"></script>
<script src="{{asset('frontendAsset')}}/js/nice-select.min.js"></script>
<script src="{{asset('frontendAsset')}}/js/circle-progress.min.js"></script>
<script src="{{asset('frontendAsset')}}/js/skill.bars.jquery.min.js"></script>
<script src="{{asset('frontendAsset')}}/js/magnific.min.js"></script>
<script src="{{asset('frontendAsset')}}/js/appear.min.js"></script>
<script src="{{asset('frontendAsset')}}/js/isotope.min.js"></script>
<script src="{{asset('frontendAsset')}}/js/imageload.min.js"></script>
<script src="{{asset('frontendAsset')}}/js/slick.min.js"></script>

<!-- main js  -->
<script src="{{asset('frontendAsset')}}/js/main.js"></script>
</body>

</html>
