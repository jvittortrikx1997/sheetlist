<?php

namespace App\Repositories\Configurations;

use App\Models\Configurations\Categories;

class CategoryRepository
{
    public function getCategoryByName(string $name)
    {
        return Categories::query()
            ->where('name', 'like', "%{$name}%")
            ->first();
    }

}
