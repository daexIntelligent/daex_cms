<?php

namespace App\Http\Requests;

use App\Exceptions\JsonFormatter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Kkday\Log\Laravel\LogHelper;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Arr;
use Config;
use Illuminate\Validation\ValidationException;

class Request extends FormRequest
{
    private const UNDEFINED_FIELD_TYPE = '0100';
    private const UNDEFINED_RULE = '00';

    public function rules()
    {
        return [];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'meta' => [
                'status' => $this->errorCode($validator),
                'pagination' => null
            ],
            'data' => null
        ], Response::HTTP_BAD_REQUEST);

        LogHelper::error(JsonFormatter::format($this, (new ValidationException($validator)), $response));

        throw new HttpResponseException($response);
    }

    public function errorCode($validator)
    {
        if (!$validator->messages()->isEmpty()) {
            $field = Arr::get($validator->messages()->keys(), 0);
            $rule = strtolower(current(array_keys(Arr::get($validator->failed(), $field))));
            $rule = Arr::first(explode(':', $rule));
            $fieldType = Arr::first(explode('.', $field));
            return Config::get('validator.fields.' . $fieldType, self::UNDEFINED_FIELD_TYPE)
                . Config::get('validator.rules.' . $rule, self::UNDEFINED_RULE);
        }
        return self::UNDEFINED_FIELD_TYPE . self::UNDEFINED_RULE;
    }

    public function all($keys = null)
    {
        $results = parent::all();
        return $results;
    }
}