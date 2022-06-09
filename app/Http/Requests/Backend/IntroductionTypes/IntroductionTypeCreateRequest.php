<?php


namespace App\Http\Requests\Backend\IntroductionTypes;


use App\Models\IntroductionType;
use Illuminate\Foundation\Http\FormRequest;

class IntroductionTypeCreateRequest extends FormRequest
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
     * @param IntroductionType $introductionType
     *
     * @return array
     */
    public function rules(IntroductionType $introductionType)
    {
        return $introductionType->rules();
    }
}
