<?php


namespace App\Http\Requests\Frontend\Products;


use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'nullable',
            'first_name' => 'required',
            'first_name' => 'required',
            'first_name' => 'required',
            'first_name' => 'required',
            'first_name' => 'required',
            'first_name' => 'required',
            'first_name' => 'required',
        ];
    }
}
