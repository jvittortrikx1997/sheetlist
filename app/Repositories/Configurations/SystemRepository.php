<?php

namespace App\Repositories\Configurations;


use App\Models\Configurations\Systems;
class SystemRepository
{
    public function getSystemByName(string $name)
    {
        return Systems::query()
            ->where('name', 'like', "%{$name}%")
            ->first();
    }

}
