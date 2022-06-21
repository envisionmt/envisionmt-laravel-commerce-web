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
            'email' => 'required|email',
            'description' => 'nullable|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'company_name' => 'nullable|max:255',
            'phone' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'post_code' => 'required|regex:/^(?:(\d{5})(?:[ \-](\d{4}))?)$/i',
            'city' => 'required|max:255',
            'address1' => 'required|max:255',
            'address2' => 'required|max:255',
        ];
    }
}
