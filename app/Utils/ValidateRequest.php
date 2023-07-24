<?php

namespace App\Utils;

use App\Exceptions\UnprocessableEntityException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Enum;

final class ValidateRequest
{
    public static function validateRequest(Request $request, array $rules): array
    {
        $validator = Validator::make($request->all(), $rules, self::messages());

        if ($validator->fails()) {
            throw new UnprocessableEntityException($validator->errors()->toJson(),422);
        }

        return $validator->validated();
    }

    private static function messages(): array
    {
        return [
            'required' => 'O campo deve ser preenchido',
            'numeric' => 'O campo deve ser numérico',
            'string' => 'O Campo não é do tipo string',
            'array' => 'O Campo não é do tipo array',
            'email' => 'O Email informado não é valido',
            'min' => 'O campo não pode ser inferior a :min caracteres',
            'max' => 'O campo não pode ser superior a :max caracteres',
            'integer' => 'O campo precisa ser um valor inteiro',
            'regex' => 'O valor passado em está em um formato inválido',
            'date' => 'A data do campo não é uma data válida',
            'date_format' => 'A data do campo deve estar no formato :format',
            'after_or_equal' => 'O campo deve ser uma data posterior ou igual a hoje',
            'in' => 'O valor informado no campo não corresponde a um valor válido',
            'unique' => 'O Valor informado no campo já existe em nossa base de dados',
            'lte' => 'O campo deve ser menor ou igual à :value',
            'digits' => 'O campo deve conter :digits dígitos',
            'boolean' => 'O valor do campo deve ser 1:true ou 0:false',
            'between' => 'O campo deve estar entre :min e :max',
            'senha.confirmed' => 'O campo de confirmação da não confere.',
            'exists' => 'O Valor do campo não existe em nossa base de dados',
            'enum' => 'O valor informado no campo não corresponde a um valor válido',
            Enum::class => 'O valor informado no campo não corresponde a um valor válido',
            'mimes' => 'O campo deve ser um arquivo do tipo: :values',
            'required_without_all' => 'O campo é obrigatório quando nenhum dos campos :values estiverem preenchidos',
            'decimal' => 'O campo deve ser um número decimal',
        ];
    }
}
