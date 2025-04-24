@extends('frontend_e_shop.layouts.app')

@section('content')
<div class="container">
    {{-- @include('backend') --}}
    <div class="row">
        <div class="col text-center">
            <div class="section_title new_arrivals_title">
                @include('frontend_e_shop.layouts.message')
                <h2>@lang('checkout')</h2>
            </div>
        </div>
    </div>
        <div class="row mt-5">
            <div class="col">
                <center>
                    @foreach ($cart as $id => $item)
                        <div class="card mx-auto my-2 shadow" style="max-width: 28rem; max-height: 6rem;">
                            <div class="card-body">
                                <div class="card mb-2 border-0 shadow-sm">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-12">
                                            <p>{{ $item['name'] }} - {{ $item['price'] }} x {{ $item['quantity'] }}</p>
                                            <a href="{{ route('frontend.cart.remove', $id) }}">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if ($cart)
                        <div class="text-end mt-4">
                            <a href="{{route('frontend.cart.checkout')}}" class="btn btn-primary">
                                @lang('add_to_cart')
                            </a>
                        </div>
                    @else
                        <div class="card mx-auto my-2 shadow" style="max-width: 28rem; max-height: 6rem;">
                            <div class="card-body">
                                <div class="card mb-2 border-0 shadow-sm">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-12">
                                            Cart is Empty
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </center>
            </div>
        </div>
    </div>
@endsection
