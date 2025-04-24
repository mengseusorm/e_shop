@extends('backend.layouts.app')

@section('title', __('Country Code'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome') {{ $logged_in_user->name }}
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.country.code.create')"
                :text="__('Create')"
            />
        </x-slot>  
        <x-slot name="body">
            <livewire:backend.country-code.country-code-table/>
        </x-slot>
    </x-backend.card>
@endsection
