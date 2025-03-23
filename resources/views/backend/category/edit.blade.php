@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Edit Category'))

@section('content')
    <x-forms.post :action="route('admin.category.update',$category->id)">
        @csrf
        <x-backend.card>
            <x-slot name="header">
                @lang('Update User')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.category')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div>  
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Category name')</label> 
                        <div class="col-md-10">
                            <input type="text" name="category_name" class="form-control" placeholder="{{ __('Name') }}" value="{{ $category->category_name}}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">@lang('Category slug	')</label> 
                        <div class="col-md-10">
                            <input type="text" name="category_slug" class="form-control" placeholder="{{ __('Category slug	') }}" value="{{ $category->category_slug }}" maxlength="255" required />
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">@lang('Category slug	')</label> 
                        <div class="col-md-10">
                            <input type="file" name="image" class="form-control"/>
                        </div>
                    </div><!--form-group-->   
                    <div class="form-group row">
                        <label for="active" class="col-md-2 col-form-label">@lang('Active')</label> 
                        <div class="col-md-10">
                            <div class="form-check">
                                <input name="status" id="active" class="form-check-input" type="checkbox" value="1" {{ old('active', true) ? 'checked' : '' }} />
                            </div><!--form-check-->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">@lang('Description')</label> 
                        <div class="col-md-10"> 
                            <textarea name="description" class="form-control"  cols="30" rows="10">{{$category->description}}</textarea>
                        </div>
                    </div><!--form-group-->  
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Category')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
