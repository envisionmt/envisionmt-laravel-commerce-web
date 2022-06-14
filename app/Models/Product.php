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

class Product extends Model
{
    use Uuids;
    use HasFactory;
    use Rules;

    const ENGLISH_KEY = 'en';
    const CHINESE_KEY = 'zh-CN';

    protected $appends = ['name', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name_english',
        'name_chinese',
        'description_english',
        'description_chinese',
        'image',
        'price',
        'type',
        'package',
        'stock_status',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Rules
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:App\Models\Category,id',
            'name_english' => 'required|max:255',
            'name_chinese' => 'required|max:255',
            'description_english' => 'required|max:255',
            'description_chinese' => 'required|max:255',
            'image' => 'required|max:255',
            'price' => 'required|numeric',
            'type' => 'required',
            'package' => 'required',
            'stock_status' => 'required',
        ];
    }

    public function getNameAttribute()
    {
        if (Lang::locale() == self::ENGLISH_KEY) {
            return $this->name_english;
        } else {
            return $this->name_chinese;
        }
    }

    public function getDescriptionAttribute()
    {
        if (Lang::locale() == self::ENGLISH_KEY) {
            return $this->description_english;
        } else {
            return $this->description_chinese;
        }
    }
}
