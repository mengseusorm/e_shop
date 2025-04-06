<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ appName() }} | @yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('/coloshop-master/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{ asset('/coloshop-master/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('/coloshop-master/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/coloshop-master/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/coloshop-master/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/coloshop-master/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/coloshop-master/styles/responsive.css')}}">
</head>

<body>

<div class="super_container">

	<!-- Header -->

	@include('frontend_e_shop.layouts.header')

	{{-- <div class="fs_menu_overlay"></div> --}}


    @yield('content')

	<!-- Footer -->

	@include('frontend_e_shop.layouts.footer')

</div>

<script src="{{ asset('/coloshop-master/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ asset('/coloshop-master/styles/bootstrap4/popper.js')}}"></script>
<script src="{{ asset('/coloshop-master/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{ asset('/coloshop-master/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('/coloshop-master/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{ asset('/coloshop-master/plugins/easing/easing.js')}}"></script>
<script src="{{ asset('/coloshop-master/js/custom.js')}}"></script>
</body>

</html>

