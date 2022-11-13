<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class RussianLanguageValidator extends AbstractValidator
{

    protected string $message = 'Field :field must have only Russian letters';

    public function rule(): bool
    {
        return preg_match('/[^а-яА-Я\s]+/msi',$this->value);
    }
}