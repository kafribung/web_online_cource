<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name'     => [ (request()->isMethod('POST') ? 'required' : ''), 'string', 'min:3', 'max:20'],
            'email'    => [ (request()->isMethod('POST') ? 'required' : ''), 'email', 'unique:users,email,' . optional($this->user)->id],
            'password' => [ (request()->isMethod('POST') ? 'required' : ''), 'string', 'min:8', (request()->isMethod('POST') ? 'confirmed' : '')],
            'password_new' => ['string', 'min:8'],
        ];
    }
}
