@extends('backend.layouts.app')

@section('title', __('Movie Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Movie Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.auth.movie.create')"
                :text="__('Create Movie')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.movie-table />
        </x-slot>
    </x-backend.card>
@endsection