@extends('frontend_e_shop.layouts.app')

@section('content')
    <!-- Banner -->
    @include('frontend_e_shop.layouts.menu')
	@include('frontend_e_shop.layouts.slider')
    @include('frontend_e_shop.layouts.banner')

    <div class="new_arrivals">
        <div class="container">
            
            <div class="row"> 
                <div class="col text-center">
                    <div class="section_title new_arrivals_title">
                        <h2>Shops</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col text-center">
                    <div class="new_arrivals_sorting">
                        <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">women's</li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">accessories</li>
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">men's</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                           <!-- Product 1 -->
                           @if ($products)
                           @foreach ($products as $product )    
                                   <div class="product-item men">
                                       <div class="product discount product_filter">
                                           <div class="product_image">
                                               <img src="{{ asset($product->image ? '/storage/uploads/'.$product->image : '/storage/uploads/no_image_available.jpg')}}" alt="">
                                           </div>
                                           <div class="favorite favorite_left"></div>
                                           <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span></span></div>
                                           <div class="product_info">
                                               <h6 class="product_name"><a href="single.html">{{$product->description}}</a></h6>
                                               <div class="product_price">{{ $product->price }} {{$product->currency ? $product->currency->symbol : '' }} <span></span></div>
                                           </div>
                                       </div>
                                   <a href="{{ route('frontend.cart.add', $product->id) }}" class="red_button add_to_cart_button">add to cart</a>
                               </div>
                           @endforeach 
                       @else
                       @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection