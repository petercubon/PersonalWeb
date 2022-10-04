<?php

declare(strict_types=1);

namespace App\Components\Cookie;

trait PresenterTrait
{
    private ControlFactory $controlFactory;
    private ?int $reCaptcha = null;

    public function injectControlFactory(ControlFactory $controlFactory)
    {
        $this->controlFactory = $controlFactory;
    }

    public function createComponentCookie(): Control
    {
        return $this->controlFactory->create(
            $this->reCaptcha,
            [$this, 'onsuccess'],
        );
    }

}