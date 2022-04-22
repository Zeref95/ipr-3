<?php

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

if (! function_exists('makeValidation')) {
    /**
     * @param array $data
     * @param array $validateArray
     * @return array
     * @throws ValidationException
     * @throws Exception
     */
    function makeValidation(array $data, array $validateArray): array
    {
        try {
            $validator = Validator::make($data, $validateArray);
            if ($validator->fails()) {
                throw new \Exception($validator->getMessageBag());
            }
            return $validator->validated();
        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }
}