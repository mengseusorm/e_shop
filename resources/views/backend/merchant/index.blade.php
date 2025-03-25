@extends('backend.layouts.app')

@section('title', __('Merchant'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.merchant.create')"
                :text="__('Create Merchant')"
            />
        </x-slot>  
        <x-slot name="body">
            @lang('Welcome to the Dashboarddhoe ')
        </x-slot>
    </x-backend.card>
@endsection
