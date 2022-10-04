<?php

declare(strict_types=1);

namespace App\Components\Cookie\Form;

use Nette\Application\UI\Form;
use Nette\Http\Response;
use stdClass;

class FormFactory
{
    public function __construct(
        private Response $response,
    ) { }

    public function create(): Form
    {
        // 1. Basic Cookie
        // 2. Google Analytics Cookie
        // 3. reCaptcha Cookie
        $form = new Form();
        $form->addCheckbox('basic');
        $form->addCheckbox('gA');
        $form->addCheckbox('reCaptcha');
        $form->addButton('send', 'ulozit nastavenie Cookies');
        $form->onSuccess[] = [$this, 'onSuccess'];
        return $form;
    }

    public function onSuccess(Form $form, stdClass $data): void
    {
        $this->response->setCookie('basic', 'true', '3600');
        $this->response->setCookie('gA', ((string)$data->gA), 3600);
        $this->response->setCookie('reCaptcha', ((string)$data->reCaptcha), 3600);
    }
}