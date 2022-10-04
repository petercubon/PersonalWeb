<?php

declare(strict_types=1);

namespace App\Components\ContactForm;

use Nette\Forms\Form;

trait PresenterTrait
{
    private ControlFactory $contactFormControlFactory;

    public function injectContactFormControlFactory(ControlFactory $controlFactory)
    {
        $this->contactFormControlFactory = $controlFactory;
    }

    public function createComponentContactForm(): Control
    {
        return $this->contactFormControlFactory->create(
            [$this, 'contactFormSuccess'],
        );
    }

    public function contactFormSuccess(Form $form, \stdClass $data): void
    {
        $this->flashMessage('Odoslanie formuláru bolo úspešné.');
        $this->redirect('this');
    }
}