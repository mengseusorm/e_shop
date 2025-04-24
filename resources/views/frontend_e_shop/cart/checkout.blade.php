@extends('frontend_e_shop.layouts.app')

@section('content')
    <h2>Checkout</h2>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>@lang('checkout')</h2>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('frontend.cart.placeOrder') }}" method="POST">
                    @csrf
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <br>
            
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <br>
            
                    <button type="submit" class="btn btn-success">Place Order</button>
                </form>
                <div class="card mt-2">
                    <div class="card-body">
                        <h5 class="card-titl">Your Cart:</h5>
                        @foreach($cart as $item)
                            <p>{{ $item['name'] }} - {{ $item['price'] }} x {{ $item['quantity'] }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
