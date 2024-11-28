<?php

namespace App\Traits;

trait ServiceValidationRules
{
    public function serviceRules(): array
    {
        return[
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'cost' => ['required', 'numeric'],
            'obs' => ['required', 'string'],
        ];
    }

    public function extractServiceData($request): array
    {
       return  array_intersect_key($request, array_flip([
           'name', 'price', 'cost', 'obs'
       ]));
    }
}
