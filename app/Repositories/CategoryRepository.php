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
        'id' => ['column' => 'categories.id', 'operator' => '='],
        'name_english' => ['column' => 'categories.name_english', 'operator' => 'like'],
        'name_chinese' => ['column' => 'categories.name_chinese', 'operator' => 'like'],
    ];

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

}
