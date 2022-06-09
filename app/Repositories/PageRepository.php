<?php


namespace App\Repositories;


use App\Models\Page;

class PageRepository extends BaseRepository
{

    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
    ];

    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    public function findBySlug($slug) {
        return $this->where('slug', $slug)->first();
    }

}
