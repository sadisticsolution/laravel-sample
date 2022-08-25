<?php

namespace App\Validations;

use Illuminate\Validation\Validator;

class User extends AbstractValidation
{

    protected const MESSAGES = [
        'isOdd' => ':attribute is not odd.',
    ];

    public function isOdd($attribute, $value, $parameters, Validator $validator): bool
    {
        $user = \App\Models\User::find($value);
        if (!$user)
            return false;

        return strlen($user->name) % 2;
    }

}
