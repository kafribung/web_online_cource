<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PlaylistRequest extends FormRequest
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
            'img'           => [ (request()->isMethod('POST')? 'required': '' ) , 'mimes:png,jpg,jpg'],
            'title'         => ['required', 'string', 'min:3', 'max:20', 'unique:playlist,title', optional($this->playlist)->id],
            'price'         => ['required', 'numeric'],
            'description'   => ['required'],
        ];
    }
}
