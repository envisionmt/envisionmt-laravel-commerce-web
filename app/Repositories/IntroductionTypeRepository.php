<?php


namespace App\Repositories;


use App\Models\IntroductionType;

class IntroductionTypeRepository extends BaseRepository
{

    /**
     * Attribute searchable
     *
     * @var array
     */
    protected $fieldSearchable = [
        'id' => ['column' => 'introduction_types.id', 'operator' => '='],
        'name' => ['column' => 'introduction_types.name', 'operator' => 'like'],
        'short_name' => ['column' => 'introduction_types.short_name', 'operator' => 'like'],
    ];

    public function __construct(IntroductionType $model)
    {
        $this->model = $model;
    }

}
