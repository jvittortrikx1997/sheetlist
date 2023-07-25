<?php

namespace App\Http\Controllers;

use App\Services\TimeReport\ImportFileService;
use App\Utils\ExceptionReturn;
use App\Utils\ValidateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TimeReportController extends Controller
{
    protected ImportFileService $importFileService;

    public function __construct(ImportFileService $importFileService)
    {
        $this->importFileService = $importFileService;
    }

    public function importFile(Request $request)
    {
        try {
            $validated = ValidateRequest::validateRequest($request, [
                'file' => ['required', 'file', 'mimes:csv,txt'],
                'user_id' => ['nullable', 'integer']
            ]);

            $this->importFileService->importFile($validated['file'], Arr::get($validated, 'user_id'));
        } catch (\Exception $e) {
            return ExceptionReturn::exceptionReturn($e);
        }

    }

}
