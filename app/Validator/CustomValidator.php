<?php

namespace App\Validator;

use Illuminate\Validation\Validator;

class CustomValidator extends Validator
{
    public function validateMaxNumber($attribute, $value, $parameters)
    {
        if (count($value) > $parameters[0]) {
            return false;
        }

        return true;
    }

     protected function replaceMaxNumber($message, $attribute, $rule, $parameters)
     {
         return str_replace(':param', $parameters[0], $message);
     }
}
