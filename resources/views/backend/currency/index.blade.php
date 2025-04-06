@extends('backend.layouts.app')

@section('title', __('Currency'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.currency.create')"
                :text="__('Create')"
            />
        </x-slot>  
        <x-slot name="body">
            <livewire:backend.currency.currency-table/>
        </x-slot>
    </x-backend.card>
@endsection
