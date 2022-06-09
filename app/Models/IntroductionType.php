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

class IntroductionType extends Model
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
        'name',
        'short_name',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];


    public function introductions()
    {
        return $this->hasMany(Introduction::class)->orderBy('created_at');;
    }

    public function introduction()
    {
        return $this->hasOne(Introduction::class);
    }

    /**
     * Rules
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'short_name' => 'required|max:255',
        ];
    }
}
