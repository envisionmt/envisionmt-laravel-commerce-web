<?php


namespace App\Repositories;


use App\Models\Product;

class ProductRepository extends BaseRepository
{

    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id' => ['column' => 'products.id', 'operator' => '='],
        'category_id' => ['column' => 'products.category_id', 'operator' => '='],
        'name_english' => ['column' => 'products.name_english', 'operator' => 'like'],
        'name_chinese' => ['column' => 'products.name_chinese', 'operator' => 'like'],
        'content_english' => ['column' => 'products.content_english', 'operator' => 'like'],
        'content_chinese' => ['column' => 'products.content_chinese', 'operator' => 'like'],
    ];

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

}
