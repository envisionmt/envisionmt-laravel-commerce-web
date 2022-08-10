<?php


namespace App\Http\Requests\Backend\Products;


use Illuminate\Foundation\Http\FormRequest;

class GalleriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'galleries' => 'required',
        ];
    }
}
