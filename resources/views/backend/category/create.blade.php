@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Create Category'))

@section('content')
    <x-forms.post :action="route('admin.category.store')" enctype="multipart/form-data">
        @csrf
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Category')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.category')" :text="__('cancel')" />
            </x-slot>
            <x-slot name="body">
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('name')</label>
                    <div class="col-md-10">
                        <input type="text" name="category_name" class="form-control" placeholder="{{ __('Name') }}"
                            value="{{ old('name') }}" maxlength="100" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">@lang('image')</label>
                    <div class="col-md-10">
                        <input type="file" name="image" class="form-control" />
                    </div>
                </div><!--form-group-->
                <div class="form-group row">
                    <label for="active" class="col-md-2 col-form-label">@lang('active')</label>

                    <div class="col-md-10">
                        <div class="form-check">
                            <input name="status" id="active" class="form-check-input" type="checkbox" value="1"
                                {{ old('active', true) ? 'checked' : '' }} />
                        </div><!--form-check-->
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label">@lang('description')</label>
                    <div class="col-md-10">
                        <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div><!--form-group-->
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
