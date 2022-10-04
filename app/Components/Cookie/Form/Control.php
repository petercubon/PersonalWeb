<?php

declare(strict_types=1);

namespace App\Components\Cookie\Form;

use Nette\Application\UI\Form;
use Nette\Http\Request;
use Nette\Http\Response;

class Control extends \Nette\Application\UI\Control
{
    /**
     * @var callable
     */
    private $onSuccess;

    public function __construct(
        private FormFactory $formFactory,
        private Request $request,
        callable $onSuccess,
    ) {
        $this->onSuccess = $onSuccess;
    }

    public function render()
    {
        $this->template->render(__DIR__ . '/default.latte');
    }

    public function createComponentForm(): Form
    {
        $form = $this->formFactory->create();

        $form->onSuccess[] = $this->onSuccess;

        return $form;
    }
}