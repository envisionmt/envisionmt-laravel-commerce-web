<?php
/**
 * Created by PhpStorm.
 * User: T0ny
 * Date: 12/9/18
 * Time: 8:04 PM
 */

namespace App\Models;

use App\Traits\Hashable;
use App\Traits\Rules;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use Uuids;
    use HasFactory;
    use Rules;

    const DELIVERY_METHOD_TYPE = 1;
    const PAYMENT_METHOD_TYPE = 2;
    const SHIPPING_DESTINATION_TYPE = 3;
    const SHIPPING_FEE_FIRST_TYPE = 4;
    const SHIPPING_FEE_SECOND_TYPE = 5;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];
    /**
     * Rules
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'type' => 'required|in:' . implode(',', array_keys(self::$typeNames)),
        ];
    }

    public static $typeNames = [
        self::DELIVERY_METHOD_TYPE => 'Delivery Method',
        self::PAYMENT_METHOD_TYPE => 'Payment Method',
        self::SHIPPING_DESTINATION_TYPE => 'Shipping Destination',
        self::SHIPPING_FEE_FIRST_TYPE => 'Shipping Fee First',
        self::SHIPPING_FEE_SECOND_TYPE => 'Shipping Fee Second',
    ];

    public function getTypeNameAttribute()
    {
        if (!isset($this->type)) {
            return null;
        }

        return self::$typeNames[$this->type];
    }
}
