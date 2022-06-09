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

class Page extends Model
{
    use Uuids;
    use HasFactory;
    use Sluggable;
    use Rules;

    const ENGLISH_KEY = 'en';
    const CHINESE_KEY = 'zh-CN';

    protected $appends = ['title', 'body'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_english',
        'title_chinese',
        'body_english',
        'body_chinese',
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
            'title_english' => 'required|max:255',
            'title_chinese' => 'required|max:255',
            'body_english' => 'required',
            'body_chinese' => 'required',
        ];
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_english'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getTitleAttribute()
    {
        if(Lang::locale() == self::ENGLISH_KEY) {
            return $this->title_english;
        } else {
            return $this->title_chinese;
        }
    }

    public function getBodyAttribute()
    {
        if(Lang::locale() == self::ENGLISH_KEY) {
            return $this->body_english;
        } else {
            return $this->body_chinese;
        }
    }

}
