<?php

namespace App\Services\Unit;

use App\Models\Unit;
use App\Services\Unit\Repositories\UnitRepository;

/**
 * Class UnitService
 * @package App\Services\Unit
 */
class UnitService
{
    public $unitRepository;

    /**
     * UnitService constructor.
     * @param $unitRepository
     */
    public function __construct(UnitRepository $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    /**
     * @param int $id
     * @return Unit|null
     */
    public function findUnit(int $id)
    {
        return $this->unitRepository->find($id);
    }

    /**
     * @return array
     */
    public function list()
    {
        $collection = $this->unitRepository->list();

        $keyed = $collection->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });

        return $keyed->all();
    }
}
