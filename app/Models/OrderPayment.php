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
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class OrderPayment extends Model
{
    use Uuids;
    use HasFactory;
    use Sluggable;
    use Rules;

    const ALIPAY_CHANNEL = 1;

    const MALAYSIA_CURRENCY = 'MYR';
    const CHINA_CURRENCY = 'CNY';
    const USA_CURRENCY = 'USD';

    const PENDING_STATUS = 1;
    const SUCCESSFUL_STATUS = 2;
    const APPROVED_STATUS = 3;
    const FAILED_STATUS = 4;
    const CANCELLED_STATUS = 5;
    const WAIT_BUYER_PAY_STATUS = 6;
    const TRADE_FINISHED_STATUS = 7;
    const TRADE_CLOSE_STATUS = 8;

    const PROCESSING_SHIPPING_STATUS = 1;
    const PACKED_SHIPPING_STATUS = 2;
    const SHIPPING_SHIPPING_STATUS = 3;
    const RECEIVED_SHIPPING_STATUS = 4;

    const DESKTOP_DEVICE = 'DESKTOP';
    const PHONE_DEVICE = 'PHONE';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'order_no',
        'channel',
        'email',
        'fpx_bank',
        'description',
        'transaction_amount',
        'transaction_amount_origin',
        'subtotal',
        'shipping_charge',
        'transaction_currency',
        'status',
        'first_name',
        'last_name',
        'post_code',
        'city',
        'address1',
        'address2',
        'shipping_status',
        'shipping_destination_id',
        'delivery_method_id',
        'payment_method_id',
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
            'user_id' => 'required|exists:App\Models\User,id',
            'order_no' => 'required|max:255',
            'channel' => 'required',
            'email' => 'required|email',
            'fpx_bank' => 'required|email',
            'description' => 'required|max:255',
            'transaction_amount' => 'required|numeric',
            'transaction_amount_origin' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'shipping_charge' => 'required|numeric',
            'transaction_currency' => 'required|max:255',
            'status' => 'required|in:' . implode(',', array_keys(self::$paymentNames)),
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'post_code' => 'required|postal_code:NL,BE',
            'city' => 'required|max:255',
            'address1' => 'required|max:255',
            'address2' => 'required|max:255',
            'shipping_status' => 'required|in:' . implode(',', array_keys(self::$shippingStatusNames)),
            'shipping_destination_id' => 'required|exists:App\Models\Delivery,id',
            'delivery_method_id' => 'required|exists:App\Models\Delivery,id',
            'payment_method_id' => 'required|exists:App\Models\Delivery,id',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shippingDestination()
    {
        return $this->belongsTo(Delivery::class, 'shipping_destination_id');
    }

    public function deliveryMethod()
    {
        return $this->belongsTo(Delivery::class, 'delivery_method_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(Delivery::class, 'payment_method_id');
    }

    public static $statusNames = [
        self::PENDING_STATUS => 'Pending',
        self::SUCCESSFUL_STATUS => 'Successful',
        self::APPROVED_STATUS => 'Approved',
        self::FAILED_STATUS => 'Failed',
        self::CANCELLED_STATUS => 'Cancelled',
        self::WAIT_BUYER_PAY_STATUS => 'Wait Buyer Pay',
        self::TRADE_FINISHED_STATUS => 'Trade Finished',
        self::TRADE_CLOSE_STATUS => 'Trade Close',
    ];

    public function getStatusNameAttribute()
    {
        if (!isset($this->status)) {
            return null;
        }

        return self::$statusNames[$this->status];
    }

    public static $shippingStatusNames = [
        self::PROCESSING_SHIPPING_STATUS => 'Processing',
        self::PACKED_SHIPPING_STATUS => 'Packed',
        self::SHIPPING_SHIPPING_STATUS => 'Shipping',
        self::RECEIVED_SHIPPING_STATUS => 'Received',
    ];

    public function getShippingStatusNameAttribute()
    {
        if (!isset($this->shipping_status)) {
            return null;
        }

        return self::$shippingStatusNames[$this->shipping_status];
    }

}
