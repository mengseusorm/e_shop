@extends('backend.layouts.app')

@section('title', __('Edit Country'))

@section('content')
    <x-forms.post :action="route('admin.country.code.update',$countrycode->id)" enctype="multipart/form-data">
        @csrf
        <x-backend.card>
            <x-slot name="header">
                @lang('edit')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action"  :text="__('cancel')" />
            </x-slot>
            <x-slot name="body">
                <div>  
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-uppercase">@lang('Country name')</label> 
                        <div class="col-md-10">
                            <input type="text" name="country_name" class="form-control" placeholder="{{ __('Country name') }}" value="{{ $countrycode->country_name }}" maxlength="100"  />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('country-code')</label> 
                        <div class="col-md-10">
                            <input type="text" name="country_code" class="form-control" placeholder="{{ __('Country code') }}" value="{{ $countrycode->country_code }}" maxlength="255"  />
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Zip code')</label> 
                        <div class="col-md-10">
                            <input type="text" name="zip" class="form-control" placeholder="{{ __('Zip code') }}" value="{{ $countrycode->zip }}" maxlength="255"  />
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
