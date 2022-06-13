<?php


namespace App\Repositories;


use App\Models\Category;

class CategoryRepository extends BaseRepository
{

    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id' => ['column' => 'introduction_types.id', 'operator' => '='],
        'title_english' => ['column' => 'introductions.title_english', 'operator' => 'like'],
        'title_chinese' => ['column' => 'introductions.title_chinese', 'operator' => 'like'],
    ];

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

}
