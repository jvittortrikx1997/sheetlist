<?php

namespace App\Utils;

use App\Exceptions\UnprocessableEntityException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;

final class ExceptionReturn
{
    public static function exceptionReturn(\Exception $e): JsonResponse
    {
        report($e);
        $code = $e->getCode();

        if (0 == $e->getCode()) {
            $code = 500;
        }

        if ($e instanceof UnprocessableEntityException) {
            return response()->json([
                'message' => 'Parâmetros informados incorretamente.',
                'data' => json_decode($e->getMessage(), true),
            ], $code);
        }

        if ($e instanceof QueryException) {
            $message = 'Ocorreu um erro interno do servidor. Por favor, tente novamente mais tarde.';

            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
            }

            abort(response()->json([
                'message' => $message,
                'data' => [],
            ], 500));
        }

        return response()->json([
            'message' => $e->getMessage(),
            'data' => [],
        ], $code);
    }
}
