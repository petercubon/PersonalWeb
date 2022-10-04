<?php

declare(strict_types=1);

namespace App\Components\ContactForm;

use app\Model\MyMailSender\MyMailSender;
use Nette\Application\UI\Form;
use Nette\Mail\Message as Message;
use Nette\Mail\SendmailMailer;

class FormFactory
{
    public function __construct(
        private MyMailSender $myMailSender,
        private string $secret,
        private string $sitekey,
    ) { }

    public function create(): Form
    {
        $form = new Form;

        $form->addText('name', 'Meno a priezvisko')
            ->setRequired('Meno a priezvisko je povinné.');

        $form->addEmail('email', 'e-mailova adresa')
            ->setRequired('Aby sme Vás mohli kontaktovať, je potrebné zadať e-mailovú adresu.');

        $form->addText('phone', 'telefonne cislo')
            ->setHtmlType('tel')
            ->setEmptyValue('+421');

        $form->addTextArea('message', 'Text spravy')
            ->addRule($form::MAX_LENGTH, 'Sprava je prilis dlha', 500)
            ->setRequired('Nie je možné odoslať správu bez textu.');

        $form->addCheckBox('aggre')
            ->setRequired('Pre odoslanie správy je nutný súhlas so spracovaním osobných údajov.');

        $form->addSubmit('send', 'Odoslat spravu');

        $form->addInvisibleReCaptcha('recaptcha', $required = TRUE, $message = 'Are you a bot?');

        $form->onSuccess[] = [$this, 'formSucceeded'];

        return $form;
    }

    public function formSucceeded(Form $form, \stdClass $data): void
    {
        $this->myMailSender->send($data);
    }

}
