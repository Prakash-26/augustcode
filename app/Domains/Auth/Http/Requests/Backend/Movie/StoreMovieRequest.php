<?php

namespace App\Domains\Auth\Http\Requests\Backend\Movie;

use App\Models\MovieListing;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreRoleRequest.
 */
class StoreMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'youtube_url' => ['required'],
            'release_date' => ['required'],
            'slug' => ['required'],
            //'name' => ['required'],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'permissions.*.exists' => __('One or more permissions were not found or are not allowed to be associated with this role type.'),
        ];
    }
}
