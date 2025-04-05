@extends('backend.layouts.app')

@section('title', __('View Product'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Product')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.product')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Image')</th>
                    <td><img src="{{ asset($product->image ? 'storage/uploads/'.$product->image : './uploads/no_image_available.jpg')}}" width="100" height="100" class="product-profile-image" /></td>
                </tr>

                <tr>
                    <th>@lang('Name')</th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>@lang('Product Code')</th>
                    <td>{{ $product->product_code }}</td>
                </tr>

                <tr>
                    <th>@lang('Category')</th>
                    <td>{{ $product->category->category_name }}</td>
                </tr>

                <tr>
                    <th>@lang('Status')</th>
                    <td>
                        <span class="badge badge-success">
                            {{ $product->status }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>@lang('Price')</th>
                    <td>
                        {{ $product->price }} 
                    </td>
                </tr>
                <tr>
                    <th>@lang('Category')</th>
                    <td>
                        {{ $product->category->category_name }} 
                    </td>
                </tr>

                <tr>
                    <th>@lang('Country')</th>
                    <td>
                        {{$product->country->country_name}}
                    </td>
                </tr>

                <tr>
                    <th>@lang('Size')</th>
                    <td>
                        {{ $product->size == 1 ? 'Small' : ($product->size == 2 ? 'Medium' : 'Large') }}
                    </td>
                </tr>

                <tr>
                    <th>@lang('Created At')</th>
                    <td>
                        @displayDate($product->created_at)
                    </td>
                </tr>
                <tr>
                    <th>@lang('Updated At')</th>
                    <td>
                        @displayDate($product->updated_at)
                    </td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>
@endsection
