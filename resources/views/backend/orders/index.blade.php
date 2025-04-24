@extends('backend.layouts.app')

{{-- @section('title', __('Merchant')) --}}

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome') {{ $logged_in_user->name }}
        </x-slot>
        <x-slot name="headerActions">
        </x-slot>  
        <x-slot name="body">
           
            <table class="table">
                <thead>
                    <tr> 
                        <th style="cursor:pointer" class="text-uppercase">
                            @lang('Order Code')
                        </th>
                        <th  style="cursor:pointer" class="text-uppercase">
                            @lang('Product Name')
                        </th>
                        <th  style="cursor:pointer" class="text-uppercase">
                            @lang('Price')
                        </th>
                        <th  style="cursor:pointer" class="text-uppercase">
                            @lang('Total Price')
                        </th>
                        <th  style="cursor:pointer" class="text-uppercase">
                            @lang('Quantity')
                        </th>
                        <th  style="cursor:pointer" class="text-uppercase">
                            @lang('Created_at')
                        </th>
                    </tr>
                </thead>
                <tbody>  
                    @foreach($orders as $order_item)   
                        <tr> 
                            <td>{{ $order_item->product->product_code }}</td>
                            <td>{{ $order_item->product->name }}</td>
                            <td>{{ $order_item->product->price }}</td>
                            <td>{{ $order_item->order->total }}</td>
                            <td>{{ $order_item->quantity }}</td>
                            <td>{{ $order_item->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        </x-slot>
    </x-backend.card>
@endsection
