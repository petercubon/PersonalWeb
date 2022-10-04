<?php

declare(strict_types=1);

namespace app\Model\MyMailSender;

use Nette\Mail\Message as Message;
use Nette\Mail\SendmailMailer;
use Nette\Mail\SendmailMailer as SendMessage;

class MyMailSender
{
    public function send($data): void
    {
        $mail = new Message();
        $mail->setFrom('info@petercubon.sk')
            ->addTo('info@petercubon.sk')
            ->setSubject('Sprava zaslana cez kontaktny formular na stránke petercubon.sk')
            ->setHtmlBody(
                '<p> Správa prijatá cez kontaktný formulár na stránke petercubon.sk </p><hr>
                        <strong> Správa čaká na potvrdenie a zaslanie jej akceptovania odosielateľovi. </strong><hr>'.
                '<p><strong> Text správy: </strong>' . $data->message . '</p>
                        <p> Meno: '. $data->name .' </p>
                        <p><strong> E-mail: </strong> ' . $data->email .',
                         <strong> Tel.: </strong> ' . $data->phone . ' .</p><br>
                        S pozdravom
                        <p>
                            <a href="https://petercubon.sk/">
                                https://petercubon.sk/
                            </a>
                        </p>
                        <p>+421 940 590 940</p>
                        <p>info@petercubon.sk</p>'
            );

        $mailer = new SendmailMailer();
        $mailer->send($mail);
    }
}