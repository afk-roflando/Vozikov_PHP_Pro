<?php

namespace App\Validators;

class BaseValidator
{
    protected array $rules = [], $errors =[];

    public function validate(array $fields = []): bool
    {
        foreach($fields as $key => $fieldValue)
        {
            if (!empty($this->rules[$key] && preg_match($this->rules[$key], subject: $fieldValue)))
            {
                unset($this->errors[$key]);
            }
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setErrors(string $key, string $message): void
    {
        $this->errors[$key] = $message;
    }
}