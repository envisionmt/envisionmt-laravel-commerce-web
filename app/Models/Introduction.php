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

class Introduction extends Model
{
    use Uuids;
    use HasFactory;
    use Rules;

    const ENGLISH_KEY = 'en';
    const CHINESE_KEY = 'zh-CN';

    protected $appends = ['title', 'sub_title', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'introduction_type_id',
        'title_english',
        'title_chinese',
        'sub_title_english',
        'sub_title_chinese',
        'image',
        'description_english',
        'description_chinese',
        'link',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function introductionType()
    {
        return $this->belongsTo(IntroductionType::class);
    }

    /**
     * Rules
     *
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'introduction_type_id' => 'required|exists:App\Models\IntroductionType,id',
            'title_english' => 'max:255',
            'title_chinese' => 'max:255',
            'sub_title_english' => 'max:255',
            'sub_title_chinese' => 'max:255',
            'image' => 'max:255',
            'description_english' => 'max:2048 ',
            'description_chinese' => 'max:2048',
            'link' => 'nullable|url|max:255',
        ];
    }

    public function getTitleAttribute()
    {
        if(Lang::locale() == self::ENGLISH_KEY) {
            return $this->title_english;
        } else {
            return $this->title_chinese;
        }
    }

    public function getSubTitleAttribute()
    {
        if(Lang::locale() == self::ENGLISH_KEY) {
            return $this->sub_title_english;
        } else {
            return $this->sub_title_chinese;
        }
    }

    public function getDescriptionAttribute()
    {
        if(Lang::locale() == self::ENGLISH_KEY) {
            return $this->description_english;
        } else {
            return $this->description_chinese;
        }
    }
}
