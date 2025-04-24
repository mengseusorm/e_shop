@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Create Category'))

@section('content')
    <x-forms.post :action="route('admin.merchant.store')" enctype="multipart/form-data">
        @csrf
        <x-backend.card>
            <x-slot name="header">
                @lang('Create')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.merchant')" :text="__('cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>  
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-uppercase">@lang('Name')</label> 
                        <div class="col-md-10">
                            <input type="text" name="merchant_name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('merchant_name') }}" maxlength="100"  />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Address')</label> 
                        <div class="col-md-10">
                            <input type="text" name="address" class="form-control" placeholder="{{ __('Address') }}" value="{{ old('address') }}" maxlength="255"  />
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('phone_number')</label> 
                        <div class="col-md-10">
                            <input type="text" name="phone_number" class="form-control" placeholder="{{ __('Phone number') }}" value="{{ old('phone_number') }}" maxlength="255"  />
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Date of birth')</label> 
                        <div class="col-md-10">
                            <input type="date" name="dob" class="form-control" value="{{ old('dob') }}"/>
                        </div>
                    </div><!--form-group-->    
                    
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Country Code')</label> 
                        <div class="col-md-10">
                            <select name="country_code_id" id="" class="form-control">
                                @foreach ($countryCodes as $countryCode )
                                    <option value="{{$countryCode->id}}">{{$countryCode->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!--form-group-->    

                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
