<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Components\Cookie\PresenterTrait;
use Nette;
use Nette\Http\Request;
use Nette\Http\Response;

final class CookiePresenter extends Nette\Application\UI\Presenter
{
    use PresenterTrait;

    use \App\Components\Cookie\Form\PresenterTrait;

    public function __construct(
        private Request $request,
        private Response $response,
    ) { }

}
