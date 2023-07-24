<?php

namespace App\Repositories;

use App\Models\Companies;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class CompanyRepository
{

    public function create(array $data)
    {
        $company = Companies::where('name', $data['name'])->first();

        if ($company) {
            throw new \Exception('Empresa já cadastrada', 400);
        }

        return Companies::create($data);
    }

    public function list(array $data, $paginate = true): Collection|LengthAwarePaginator|array
    {
        $company = Companies::query();

        if (isset($data['name'])) {
            $company->where('name', 'like', '%' . $data['name'] . '%');
        }

        if ($paginate) {
            return $company->paginate(100);
        }

        return $company->get();
    }

}
