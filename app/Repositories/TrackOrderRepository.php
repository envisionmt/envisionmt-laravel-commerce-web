<?php


namespace App\Repositories;


use App\Models\TrackOrder;

class TrackOrderRepository extends BaseRepository
{

    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
    ];

    public function __construct(TrackOrder $model)
    {
        $this->model = $model;
    }

}
