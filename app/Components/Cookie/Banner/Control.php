<?php

declare(strict_types=1);

namespace App\Components\Cookie;

use Nette\Http\Request;
use Nette\Http\Response;

class Control extends \Nette\Application\UI\Control
{
    public function __construct(
        private Response $response,
        private Request $request,
        private ?int $reCaptcha = null,
        private ?string $basic = null,
    ) { }

    public function render()
    {
        if (!$this->request->getCookie('reCaptcha')){
            $this->reCaptcha = 0;
        }
        else {
            $this->reCaptcha = 1;
        }
        $this->template->reCaptcha = $this->reCaptcha;


        if ($this->request->getCookie('basic'))
        {
            $this->basic = 'true';
        }
        else
        {
            $this->template->basic = '';
        }

        $this->template->basic = $this->basic;
        $this->template->render(__DIR__ . '/default.latte');
    }

    public function handleacceptAllCookie()
    {
        $this->response->setCookie('basic', 'true', '365 days');
        $this->response->setCookie('gA', 'true', '365 days');
        $this->response->setCookie('reCaptcha', 'true', '365 days');
    }

    public function handleClose(): void
    {
        $basic = $this->response->setCookie('basic', 'true', '365 days');
        $this->getPresenter()->redirect('this');
    }

}