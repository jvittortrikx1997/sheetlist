<?php

namespace App\Utils;

use App\Enums\HttpStatus;
use Illuminate\Http\Request;

final class ValidateReturn
{

    public static function validateReturn(Request $request, array $returnMessage, int $status): \Illuminate\Http\JsonResponse
    {
        if ($request->getRealMethod() == 'GET' && count($returnMessage['data'] ?? []) == 0) {
            return response()->json([
                'message' => 'Registros não encontrados!',
                'data' => [],
            ], 402);
        }

        return response()->json($returnMessage, $status);
    }
}
