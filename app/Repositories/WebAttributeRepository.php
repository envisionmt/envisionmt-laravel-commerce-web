<?php


namespace App\Repositories;


use App\Models\WebAttribute;

class WebAttributeRepository extends BaseRepository
{

    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
    ];

    public function __construct(WebAttribute $model)
    {
        $this->model = $model;
    }

}
