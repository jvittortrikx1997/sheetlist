<?php

namespace App\Repositories\Configurations;

use App\Models\Configurations\Projects;

class ProjectRepository
{

    public function getProjectByName(string $name)
    {
        return Projects::query()
            ->where('name', 'like', "%{$name}%")
            ->first();
    }

}
