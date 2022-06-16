<?php


namespace App\Http\Requests\Backend\Deliveries;


use App\Models\Delivery;
use Illuminate\Foundation\Http\FormRequest;

class DeliveryUpdateRequest extends FormRequest
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
     * @param Delivery $delivery
     * @return array
     */
    public function rules(Delivery $delivery)
    {
        return $delivery->rules();
    }
}
