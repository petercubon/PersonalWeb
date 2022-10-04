<?php

declare(strict_types=1);

namespace App\Components\Cookie\Form;

use Nette\Application\UI\Control;

trait PresenterTrait
{
    private ControlFactory $setCookieControlFactory;

    public function injectSetCookieControlFactory(ControlFactory $controlFactory)
    {
        $this->setCookieControlFactory = $controlFactory;
    }

    public function createComponentSetCookieForm(): Control
    {
        return $this->setCookieControlFactory->create(
            [$this, 'onSuccess'],
        );
    }

    public function onSuccess(): void
    {
        $this->redirect('this');
    }
}