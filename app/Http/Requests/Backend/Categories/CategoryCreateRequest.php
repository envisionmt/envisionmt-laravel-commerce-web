<?php


namespace App\Http\Requests\Backend\Categories;


use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
     * @param Category $category
     * @return array
     */
    public function rules(Category $category)
    {
        return $category->rules();
    }
}
