@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    {{-- <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            @lang('Welcome to the Dashboard')
        </x-slot>
    </x-backend.card> --}}
    
    <div class="row">
        <div class="row">
            <div class="col">
                <div class="card shadow-lg border-0 border border-primary" style="width: 18rem; background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white;">
                    <div class="card-body text-center">
                      <h5 class="card-title font-weight-bold">
                          CATEGORY
                      </h5>
                      <h1 class="d-flex justify-content-center align-items-center">
                          <i class="cil-tags mr-2" style="font-size: 2rem;"></i>
                          <span>{{$categories ? $categories->count() : 0}}</span>
                      </h1>
                      <a href="{{route('admin.category')}}" class="btn btn-light mt-3">Go</a>
                    </div>
                </div>    
            </div>
            <div class="col">
                <div class="card shadow-lg border-0 border border-primary" style="width: 18rem; background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white;">
                    <div class="card-body text-center">
                      <h5 class="card-title font-weight-bold">
                          PRODUCT
                      </h5>
                      <h1 class="d-flex justify-content-center align-items-center">
                          <i class="cil-inbox mr-2" style="font-size: 2rem;"></i>
                          <span>{{$products ? $products->count() : 0}}</span>
                      </h1>
                      <a href="{{route('admin.product')}}" class="btn btn-light mt-3">Go</a>
                    </div>
                </div>    
            </div>
            <div class="col">
                <div class="card shadow-lg border-0 border border-primary" style="width: 18rem; background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white;">
                    <div class="card-body text-center">
                      <h5 class="card-title font-weight-bold">
                            USERS
                      </h5>
                      <h1 class="d-flex justify-content-center align-items-center">
                          <i class="cil-user mr-2" style="font-size: 2rem;"></i>
                          <span>{{$users ? $users->count() : 0}}</span>
                      </h1>
                      <a href="{{route('admin.auth.user.index')}}" class="btn btn-light mt-3">Go</a>
                    </div>
                </div>    
            </div>
          </div>
    </div>
@endsection
