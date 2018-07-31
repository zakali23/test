<?php
/**
 * Created by PhpStorm.
 * User: zak
 * Date: 05/06/18
 * Time: 14:26
 */


namespace AppBundle\Service;


class Mailer
{
    private $mailer;
    private $templating;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function sendEmail($nomInfo,$prenomInfo,$telephoneInfo,$emailInfo,$adresseInfo,$messageInfo)
    {
        $body = $this->templating->render('emails/send.html.twig', [
            'nomInfo' => $nomInfo,
            'prenomInfo' => $prenomInfo,
            'telephoneInfo' => $telephoneInfo,
            'emailInfo' => $emailInfo,
            'adresseInfo' => $adresseInfo,
            'messageInfo' => $messageInfo
        ]);
        $message = (new \Swift_Message('infoContact'))
            ->setFrom($emailInfo)
            ->setTo('caldex67@gmail.com')
            ->setBody($body, 'text/html');
        $this->mailer->send($message);
    }
}