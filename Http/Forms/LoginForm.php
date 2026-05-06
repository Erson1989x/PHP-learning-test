<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{

    protected $errors = [];

    public function __construct(public array $attributes)
    {
        $this->attributes = $attributes;

        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = "A valid email address is required.";
        }

        if (!Validator::string($attributes['password'], 8)) {
            $this->errors['password'] = "Please provide a valid password.";
        }
    }

    public static function validate($attributes)
    {

        $instance = new static($attributes);

        if($instance->failed()) {
            ValidationException::throw( $instance->errors(), $instance->attributes );
        }

        return $instance;
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}
