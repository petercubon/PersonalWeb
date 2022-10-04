<?php

namespace App\Components\ContactForm;

interface ControlFactory
{
    public function create(
        callable $onSuccess,
    ): Control;
}