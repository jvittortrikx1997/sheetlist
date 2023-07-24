<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use App\Utils\ExceptionReturn;
use App\Utils\ValidateRequest;
use App\Utils\ValidateReturn;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    protected CompanyRepository $companyRepository;

    public function __construct(
        CompanyRepository $companyRepository
    )
    {
        $this->companyRepository = $companyRepository;
    }

    public function create(Request $request)
    {
        try {
            $validated = ValidateRequest::validateRequest($request, [
                'name' => ['required', 'string', 'min:3', 'max:255'],
            ]);

            $company = $this->companyRepository->create($validated);
        } catch (\Exception $e) {
            return ExceptionReturn::exceptionReturn($e);
        }


        return response()->json([
            'message' => 'Empresa criada com sucesso',
            'data' => [
                $company
            ]
        ], 201);
    }

    public function list(Request $request)
    {
        try {
            $validated = ValidateRequest::validateRequest($request, [
                'name' => ['nullable', 'string', 'min:3', 'max:255'],
            ]);

            $list = $this->companyRepository->list($validated)->toArray();
        } catch (\Exception $e) {
            return ExceptionReturn::exceptionReturn($e);
        }

        $requestReturn = [
            'message' => 'Empresas encontrados com sucesso',
            'data' => $list['data'],
            'currentPage' => $list['current_page'],
            'totalPage' => $list['last_page'],
            'totalPerPage' => count($list['data']),
            'total' => $list['total'],
        ];

        return ValidateReturn::validateReturn($request, $requestReturn, 200);
    }


}
