<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

class StoreAlbumRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'max:255', 'unique:albums'],
            'image' => ['required'],
            'user_id' => 'exists:App\Models\User,id', // or you may use table name instead of Model i.e. 'user_id' => 'exists:users,id'
        ];

        // conditional validation for image field
        $image = $this->image ?? null;

        if ($image && $image instanceof UploadedFile) {
            $rules['image'][] = 'image';
        } else {
            $rules['image'][] = 'url';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Album should have a name.',
            'name.max' => 'Album name should not be too long.',
            'name.unique' => 'Album name should not be repeated'
        ];
    }
}
