<?php

namespace App\Services\Unit\Repositories;

use App\Models\Unit;

/**
 * Class UnitRepository
 * @package App\Services\Unit\Repositories
 */
class UnitRepository
{
    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return Unit::find($id);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function list()
    {
        return Unit::orderBy('name')->get();
    }
}
