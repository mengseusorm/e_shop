@extends('frontend_e_shop.layouts.app')

@section('content')
	<!-- Slider -->


	<!-- Banner -->

    {{-- @include('frontend_e_shop.layouts.menu') --}}

	@include('frontend_e_shop.layouts.slider')
	@include('frontend_e_shop.layouts.banner')
	<!-- New Arrivals -->

	@include('frontend_e_shop.pages.newArrival')

	<!-- Deal of the week -->

	@include('frontend_e_shop.pages.dealoftheweek')

	<!-- Best Sellers -->

	@include('frontend_e_shop.pages.best_sellers')

	<!-- Benefit -->

	@include('frontend_e_shop.pages.benefit')	

	<!-- Blogs -->

	@include('frontend_e_shop.pages.blog')

	<!-- Newsletter -->

	@include('frontend_e_shop.pages.newsletter')
@endsection