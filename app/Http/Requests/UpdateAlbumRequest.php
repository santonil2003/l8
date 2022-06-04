<?php

namespace App\Http\Requests;

use App\Models\Album;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateAlbumRequest extends FormRequest
{
    public $model;

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
        // fetch the album instance from route, and extract album->id
        $id = $this->route('album')->id;
        return [
            'name' => 'required|max:255|unique:albums,name,' . $id,
        ];
    }
}
