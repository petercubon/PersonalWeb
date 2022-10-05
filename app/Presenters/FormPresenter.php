<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Components;
use Nette\Application\UI\Form;
use Nette\Http\Response;
use Nette\Http\Request;
use Contributte\ReCaptcha;

class FormPresenter extends \Nette\Application\UI\Presenter
{
    use Components\ContactForm\PresenterTrait;
}