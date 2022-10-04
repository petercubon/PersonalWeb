<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Components;
use Nette;
use Tomaj\Form\Renderer\BootstrapVerticalRenderer;
use Nette\Application\UI\Form;
use Nette\Utils\Strings;
use Nette\Http\Response;
use Nette\Http\Request;
use Tracy\Debugger;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    use Components\ContactForm\PresenterTrait;

    use Components\Cookie\PresenterTrait;

	public function __construct(
        public Nette\Database\Explorer $db,
        private Response $response,
        private Request $request,
    ){
    }

    public function actionDefault()
    {
//        if (!$this->getHttpRequest()->getCookie('reCaptcha')){
//            $this->reCaptcha = 0;
//        }
//        else {
//            $this->reCaptcha = 1;
//        }
//        $this->template->reCaptcha = $this->reCaptcha;
    }

    public function renderDefault()
    {
        $this->template->pages = $this->db->table('pages')->limit(4)->order('RAND()');

//        if ($this->request->getCookie('basic'))
//        {
//            $this->template->basic = 'true';
//        }
//        else
//        {
//            $this->template->basic = '';
//        }

    }

}
