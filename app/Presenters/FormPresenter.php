<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Components\ContactForm\PresenterTrait;
use Nette\Application\UI\Form;
use Nette\Http\Response;
use Nette\Http\Request;
use Contributte\ReCaptcha;

class FormPresenter extends \Nette\Application\UI\Presenter
{
    use PresenterTrait;

    public function __construct(
        private Response $response,
        private Request $request,
        public ?int $reCaptcha = null,
    ) { }

    public function actionDefault()
    {
        if (!$this->getHttpRequest()->getCookie('reCaptcha')){
            $this->reCaptcha = 0;
        }
        else {
            $this->reCaptcha = 1;
        }
        $this->template->reCaptcha = $this->reCaptcha;
    }

    public function renderForm()
    {
        
    }

    protected function createComponentForm()
    {
        $form = new Form();

        $form->addReCaptcha('recaptcha', $label = 'Captcha', $required = TRUE, $message = 'Are you a bot?');

        return $form;
}

}