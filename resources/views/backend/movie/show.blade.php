@extends('backend.layouts.app')

@section('title', __('View Movie'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('View Movie')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link class="card-header-action" :href="route('admin.auth.movie.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-hover">
                <tr>
                    <th>@lang('Name')</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th>@lang('Description')</th>
                    <td>{{ $user->description }}</td>
                </tr>

                <tr>
                    <th>@lang('Youtube URL')</th>
                    <td>{{ $user->youtube_url }}</td>
                </tr>

                <tr>
                    <th>@lang('Slug')</th>
                    <td>{{ $user->slug }}</td>
                </tr>

                <tr>
                    <th>@lang('Release Date')</th>
                    <td>{{ $user->release_date }}</td>
                </tr>


            </table>

            </x-slot>

                

                <!-- <tr>
                    <th>@lang('Avatar')</th>
                    <td><img src="{{ $user->avatar }}" class="user-profile-image" /></td>
                </tr> -->

    </x-backend.card>
@endsection
