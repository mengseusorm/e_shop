@extends('backend.layouts.app')

@section('title', __('Category'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome') {{ $logged_in_user->name }}
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.category.create')"
                :text="__('Create')"
            />
        </x-slot> 
        <x-slot name="body">
            {{-- @livewire('backend/category/category') --}}
            <livewire:backend.category.category-table/>
        </x-slot>
    </x-backend.card>
@endsection
