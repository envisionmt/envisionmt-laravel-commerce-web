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
use Illuminate\Support\Facades\Lang;

class Category extends Model
{
    use Uuids;
    use HasFactory;
    use Rules;

    const ENGLISH_KEY = 'en';
    const CHINESE_KEY = 'zh-CN';

    protected $appends = ['name'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_english',
        'name_chinese',
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
            'name_english' => 'required|max:255',
            'name_chinese' => 'required|max:255',
        ];
    }

    public function getNameAttribute()
    {
        if(Lang::locale() == self::ENGLISH_KEY) {
            return $this->name_english;
        } else {
            return $this->name_chinese;
        }
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
