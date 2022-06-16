<?php


namespace App\Repositories;


use App\Models\Delivery;

class DeliveryRepository extends BaseRepository
{

    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id' => ['column' => 'deliveries.id', 'operator' => '='],
        'name' => ['column' => 'deliveries.name', 'operator' => 'like'],
    ];

    public function __construct(Delivery $model)
    {
        $this->model = $model;
    }

}
