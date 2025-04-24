@extends('backend.layouts.app')

@section('title', __('Update Merchant'))

@section('content')
    <x-forms.post :action="route('admin.merchant.update',$merchant->id)" enctype="multipart/form-data">
        @csrf
        <x-backend.card>
            <x-slot name="header">
                @lang('edit')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.merchant')" :text="__('cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>  
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-uppercase">@lang('Name')</label> 
                        <div class="col-md-10">
                            <input type="text" name="merchant_name" class="form-control" placeholder="{{ __('Name') }}" value="{{$merchant->merchant_name}}" maxlength="100"  />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Address')</label> 
                        <div class="col-md-10">
                            <input type="text" name="address" class="form-control" placeholder="{{ __('Address') }}" value="{{ $merchant->address }}" maxlength="255"  />
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('phone_number')</label> 
                        <div class="col-md-10">
                            <input type="text" name="phone_number" class="form-control" placeholder="{{ __('Phone number') }}" value="{{ $merchant->phone_number}}" maxlength="255"  />
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Date of birth')</label> 
                        <div class="col-md-10"> 
                            <input type="date" name="dob" class="form-control" value="{{ (\Carbon\Carbon::parse($merchant->dob)->format('Y-m-d')) }}"/>
                        </div>
                    </div><!--form-group-->    
                    
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Country Code')</label> 
                        <div class="col-md-10">
                            <select name="country_code_id"  class="form-control">
                                @foreach ($country_code as $countryCode )
                                    <option value="{{$countryCode->id}}" {{ $merchant->country_code_id == $countryCode->id ? 'selected' : ''}}>{{$countryCode->country_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!--form-group-->    

                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
