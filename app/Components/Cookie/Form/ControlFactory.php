<?php

declare(strict_types=1);

namespace App\Components\Cookie\Form;

interface ControlFactory
{
    public function create(
        callable $onSuccess,
    ): Control;
}