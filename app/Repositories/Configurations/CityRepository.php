<?php

namespace App\Repositories\Configurations;

use App\Models\Configurations\Cities;

class CityRepository
{

    public function getCityByName(string $name)
    {
        return Cities::query()
            ->where('name', 'like', "%{$name}%")
            ->first();
    }

}
