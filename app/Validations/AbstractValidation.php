<?php

namespace App\Validations;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionMethod;

class AbstractValidation
{

    protected const IMPLICIT_RULES = [];
    protected const MESSAGES = [];

    public static function register(Factory $factory)
    {
        $class = new ReflectionClass(static::class);
        $methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $method) {
            $rule = $class->getShortName() . Str::studly($method->name);
            $extension = static::class . '@' . $method->name;
            $message = static::MESSAGES[$method->name] ?? null;

            if (in_array($method->name, static::IMPLICIT_RULES)) {
                $factory->extendImplicit($rule, $extension, $message);
            } else {
                $factory->extend($rule, $extension, $message);
            }
        }
    }

}
