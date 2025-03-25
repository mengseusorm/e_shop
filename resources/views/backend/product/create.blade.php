@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Create Category'))

@section('content')
    <x-forms.post :action="route('admin.category.store')" enctype="multipart/form-data">
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
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('slug')</label> 
                        <div class="col-md-10">
                            <input type="text" name="slug" class="form-control" placeholder="{{ __('Slug') }}" value="{{ old('category_slug') }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->      
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('Merchant')</label> 
                        <div class="col-md-10">
                            <select name="mechant_id" class="form-control"></select>
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('price')</label> 
                        <div class="col-md-10">
                            <input type="number" name="price" class="form-control" placeholder="{{ __('Price') }}" value="{{ old('category_slug') }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label text-uppercase">@lang('category')</label> 
                        <div class="col-md-10">
                            <select name="category_id" class="form-control"></select>
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="size" class="col-md-2 col-form-label text-uppercase">@lang('size')</label> 
                        <div class="col">
                            <div class="form-check">
                                <input name="size" id="active" class="form-check-input" type="checkbox" value="1" {{ old('active', true) ? 'checked' : '' }} />
                            </div><!--form-check-->
                            <div class="form-check">
                                <input name="size" id="active" class="form-check-input" type="checkbox" value="1" {{ old('active', true) ? 'checked' : '' }} />
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
                            <input type="file" name="image" class="form-control"/>
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
