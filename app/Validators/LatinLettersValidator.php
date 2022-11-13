<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class LatinLettersValidator extends AbstractValidator
{

    protected string $message = 'Field :field must have only latin letters';

    public function rule(): bool
    {
        return preg_match("/[a-z0-9_]/i", $this->value);
    }
}