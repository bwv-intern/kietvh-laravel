<?php

namespace App\Helpers;

class ErrorHelper
{
    public static function displayError($errors, $field)
    {
        $error = $errors->first($field);
        if ($error !== null) {
            return $error;
        }
        return '';
    }
}
