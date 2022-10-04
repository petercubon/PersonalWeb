<?php

namespace App\Components\ContactForm;

use Nette\Application\UI\Form;

class Control extends \Nette\Application\UI\Control
{
    /**
     * @var callable
     */
    private $onSuccess;

    public function __construct(
        private FormFactory $contactFormFormFactory,
        callable $onSuccess = null,
        private ?int $reCaptcha = null,
    )
    {
        $this->onSuccess = $onSuccess;
    }

    public function render()
    {
        $this->template->render(__DIR__ . '/default.latte');
    }

    protected function createComponentContactForm(): Form
    {
        $form = $this->contactFormFormFactory->create();
        $form->onSuccess[] = $this->onSuccess;
        return $form;
    }

}