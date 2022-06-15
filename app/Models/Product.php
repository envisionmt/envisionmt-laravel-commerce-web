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

    const IN_STOCK_STATUS = 1;
    const OUT_OF_STOCK_STATUS = 2;

    const NORMAL_TYPE = 1;
    const NEW_TYPE = 2;
    const HOT_TYPE = 3;
    const SALE_TYPE = 4;

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
        'content_english',
        'content_chinese',
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
            'content_english' => 'required|max:2550',
            'content_chinese' => 'required|max:2550',
            'image' => 'required|max:255',
            'price' => 'required|numeric',
            'type' => 'required|in:' . implode(',', array_keys(self::$typeNames)),
            'package' => 'required',
            'stock_status' => 'required|in:' . implode(',', array_keys(self::$stockStatusNames)),

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

    public static $stockStatusNames = [
        self::IN_STOCK_STATUS => 'In Stock',
        self::OUT_OF_STOCK_STATUS => 'Out Of Stock',
    ];

    public function getStockStatusNameAttribute()
    {
        if (!isset($this->stock_status)) {
            return null;
        }

        return self::$stockStatusNames[$this->stock_status];
    }

    public static $typeNames = [
        self::NORMAL_TYPE => 'Normal',
        self::NEW_TYPE => 'New',
        self::HOT_TYPE => 'Hot',
        self::SALE_TYPE => 'Sale',
    ];

    public function getTypeNameAttribute()
    {
        if (!isset($this->type)) {
            return null;
        }

        return self::$typeNames[$this->type];
    }
}
