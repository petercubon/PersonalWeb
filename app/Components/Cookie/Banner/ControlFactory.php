<?php

declare(strict_types=1);

namespace App\Components\Cookie;

interface ControlFactory
{
    public function create(
        ?int $reCaptcha,
    ): Control;
}