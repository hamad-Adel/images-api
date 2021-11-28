<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResizeImageRequest extends FormRequest
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
            'image' => ['required'],
            'w'=> ['required', 'regex:/^\d+(\.\d+)?%?$/'], // Width 50, 50%
            'h'=>'egex:/^\d+(\.\d+)?%?$/',
            'album_id' => 'exists:App\Models\Album,id'
        ];

        $image = $this->image ?? false;
        if ($image instanceof \Illuminate\Http\UploadedFile ) 
            $rules['image'][] = 'image';
        else
            $rules['image'][] = 'url';
        
        return $rules;
    }
}
