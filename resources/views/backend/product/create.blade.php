@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Create Category'))

@section('content')
    <x-forms.post :action="route('admin.product.store')" enctype="multipart/form-data">
        @csrf
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Product')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.product')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>  
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-uppercase">@lang('Product')</label> 
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->
    
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Merchant')</label> 
                        <div class="col-md-10">
                            <select name="merchant_id" class="form-control">
                                @foreach ($merchants as $merchant )
                                    <option value="{{$merchant->id}}">{{$merchant->merchant_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('price')</label> 
                        <div class="col-md-10">
                            <input type="number" name="price" class="form-control" placeholder="{{ __('Price') }}" value="{{ old('category_slug') }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="size" class="col-md-2 col-form-label text-uppercase">@lang('Currency')</label> 
                        <div class="col">
                            @foreach ($currencies as $currency )
                                <div class="form-check">
                                    <input name="currency_id" id="currency" class="form-check-input" type="radio" value="{{$currency->id}}" {{ is_array(old('currency')) && in_array($currency->id, old('currency')) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="currency"><span class="badge badge-success">{{$currency->symbol}}</span> {{$currency->code}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div><!--form-group-->     
                    
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('category')</label> 
                        <div class="col-md-10">
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category )
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Country Code')</label> 
                        <div class="col-md-10">
                            <select name="country_code_id" class="form-control">
                                @foreach ($countries as $country )
                                    <option value="{{$country->id}}">{{$country->country_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="size" class="col-md-2 col-form-label text-uppercase">@lang('size')</label> 
                        <div class="col">
                            <div class="form-check">
                                <input name="size" id="small" class="form-check-input" type="radio" value="1" {{ is_array(old('size')) && in_array(1, old('size')) ? 'checked' : '' }} />
                                <label class="form-check-label" for="small">@lang('Small')</label>
                            </div>
                            <div class="form-check">
                                <input name="size" id="medium" class="form-check-input" type="radio" value="2" {{ is_array(old('size')) && in_array(2, old('size')) ? 'checked' : '' }} />
                                <label class="form-check-label" for="medium">@lang('Medium')</label>
                            </div>
                            <div class="form-check">
                                <input name="size" id="large" class="form-check-input" type="radio" value="3" {{ is_array(old('size')) && in_array(3, old('size')) ? 'checked' : '' }} />
                                <label class="form-check-label" for="large">@lang('Large')</label>
                            </div> 
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="active" class="col-md-2 col-form-label text-uppercase">@lang('Active')</label>
                        <div class="col-md-10">
                            <div class="form-check">
                                <input name="status" id="active" class="form-check-input" type="checkbox" value="1" {{ old('active', true) ? 'checked' : '' }} />
                            </div><!--form-check-->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Image')</label> 
                        <div class="col-md-10">
                            <input type="file" name="image" class="form-input"/>
                        </div>
                    </div><!--form-group--> 
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Description')</label> 
                        <div class="col-md-10"> 
                            <textarea name="description" class="form-control"  cols="30" rows="10"></textarea>
                        </div>
                    </div><!--form-group-->  
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Product')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
