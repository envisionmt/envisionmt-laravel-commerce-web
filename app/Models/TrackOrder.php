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

class TrackOrder extends Model
{
    use Uuids;
    use HasFactory;
    use Rules;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'track_order_code',
        'step1',
        'step2',
        'step3',
        'step4',
        'days',
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
            'track_order_code' => 'required|exists:App\Models\TrackOrder,track_order_code',
        ];
    }
}
