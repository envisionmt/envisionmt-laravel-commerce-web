<?php


namespace App\Http\Requests\Backend\Introductions;


use App\Models\Introduction;
use Illuminate\Foundation\Http\FormRequest;

class IntroductionCreateRequest extends FormRequest
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
     * @param Introduction $introduction
     *
     * @return array
     */
    public function rules(Introduction $introduction)
    {
        return $introduction->rules();
    }
}
