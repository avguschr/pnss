<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class PositiveNumberValidator extends AbstractValidator
{

    protected string $message = 'Field :field is negative number';

    public function rule(): bool
    {
        return !($this->value < 1);
    }
}