@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Create Category'))

@section('content')
    <x-forms.post :action="route('admin.country.code.store')" enctype="multipart/form-data">
        @csrf
        <x-backend.card>
            <x-slot name="header">
                @lang('Create User')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.country.code')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                <div>  
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-uppercase">@lang('Country name')</label> 
                        <div class="col-md-10">
                            <input type="text" name="country_name" class="form-control" placeholder="{{ __('Country name') }}" value="{{ old('country_name') }}" maxlength="100"  />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Country code')</label> 
                        <div class="col-md-10">
                            <input type="text" name="country_code" class="form-control" placeholder="{{ __('Country code') }}" value="{{ old('country_code') }}" maxlength="255"  />
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Zip code')</label> 
                        <div class="col-md-10">
                            <input type="text" name="zip" class="form-control" placeholder="{{ __('Zip code') }}" value="{{ old('zip') }}" maxlength="255"  />
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
