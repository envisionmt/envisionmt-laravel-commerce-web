<?php


namespace App\Http\Requests\Backend\Products;


use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
     * @param Product $product
     * @return array
     */
    public function rules(Product $product)
    {
        return $product->rules();
    }
}
