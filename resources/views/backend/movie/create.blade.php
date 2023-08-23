

@extends('backend.layouts.app')

@section('title', __('Create Movie'))

@section('content')
    <x-forms.post :action="route('admin.auth.movie.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create Movie')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.movie.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div >
                   

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" maxlength="100" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Description')</label>

                        <div class="col-md-10">
                            <textarea name="description" class="form-control" placeholder="{{ __('Description') }}" maxlength="100" required>{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Youtube URL')</label>

                        <div class="col-md-10">
                            <input type="text" name="youtube_url" class="form-control" placeholder="{{ __('Youtube URL') }}" value="{{ old('youtube_url') }}" maxlength="100" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Release Date')</label>

                        <div class="col-md-10">
                            <input type="date" name="release_date" class="form-control" placeholder="{{ __('Release Date') }}" value="{{ old('release_date') }}" maxlength="100" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Slug')</label>

                        <div class="col-md-10">
                            <input type="text" name="slug" class="form-control" placeholder="{{ __('Slug') }}" value="{{ old('slug') }}" maxlength="100" required />
                        </div>
                    </div>

                    
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Movie')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
