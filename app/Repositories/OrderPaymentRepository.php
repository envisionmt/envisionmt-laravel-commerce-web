<?php


namespace App\Repositories;


use App\Models\OrderPayment;

class OrderPaymentRepository extends BaseRepository
{

    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id' => ['column' => 'order_payments.id', 'operator' => '='],
        'order_no' => ['column' => 'order_payments.order_no', 'operator' => 'like'],
    ];

    public function __construct(OrderPayment $model)
    {
        $this->model = $model;
    }

}
