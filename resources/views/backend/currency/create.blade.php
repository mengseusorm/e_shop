@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Currency'))

@section('content')
    <x-forms.post :action="route('admin.currency.store')" enctype="multipart/form-data">
        @csrf
        <x-backend.card>
            <x-slot name="header">
                @lang('Currency')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.country.code')" :text="__('Cancel')" />
            </x-slot>
            <x-slot name="body">
                <div>  
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-uppercase">@lang('Name')</label> 
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('country_name') }}" maxlength="100"  />
                        </div>
                    </div><!--form-group-->
                    <div class="form-group row">
                        <label for="symbol" class="col-md-2 col-form-label text-uppercase">@lang('Symbol')</label> 
                        <div class="col-md-10">
                            <input type="text" name="symbol" class="form-control" placeholder="{{ __('Symbol') }}" value="{{ old('symbol') }}" maxlength="255"  />
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="code" class="col-md-2 col-form-label text-uppercase">@lang('Code')</label> 
                        <div class="col-md-10">
                            <input type="text" name="code" class="form-control" placeholder="{{ __('Code') }}" value="{{ old('code') }}" maxlength="255"  />
                        </div>
                    </div><!--form-group-->      
                    <div class="form-group row">
                        <label for="exchange_rate" class="col-md-2 col-form-label text-uppercase">@lang('Exchange rate')</label> 
                        <div class="col-md-10">
                            <input type="number" name="exchange_rate" class="form-control" placeholder="{{ __('Exchange rate') }}" value="{{ old('exchange_rate') }}" maxlength="255"  />
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
