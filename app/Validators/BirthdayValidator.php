<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class BirthdayValidator extends AbstractValidator
{

    protected string $message = 'Field :field must be less than today';

    public function rule(): bool
    {
        date_default_timezone_set('Asia/Tomsk');
        $today = date('Y-m-d', time());
        return !($this->value > $today);
    }
}