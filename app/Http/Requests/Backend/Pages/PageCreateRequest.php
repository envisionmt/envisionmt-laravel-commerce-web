<?php


namespace App\Http\Requests\Backend\Pages;


use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;

class PageCreateRequest extends FormRequest
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
     * @param Page $page
     * @return array
     */
    public function rules(Page $page)
    {
        return $page->rules();
    }
}
