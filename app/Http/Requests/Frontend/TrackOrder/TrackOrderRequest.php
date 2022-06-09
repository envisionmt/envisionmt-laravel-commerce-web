<?php


namespace App\Http\Requests\Frontend\TrackOrder;


use App\Models\TrackOrder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class TrackOrderRequest extends FormRequest
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
     *
     * @param TrackOrder $trackOrder
     * @return array
     */
    public function rules(TrackOrder $trackOrder)
    {
        $attributes = $this->request->all();
        $attributes['ip'] = $this->ip();
        Log::info('track-data', $attributes);
        return $trackOrder->rules();
    }
}
