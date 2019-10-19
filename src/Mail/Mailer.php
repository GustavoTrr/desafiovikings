<?php

namespace Viking\Mail;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;
use Viking\Config\MailConfig;

class Mailer
{

    public static function testar($emailDestinatario, $assunto, $mensagem)
    {
        $result = self::enviarEmail([$emailDestinatario], $assunto, $mensagem);
        dd($result);
    }

    /**
     * Undocumented function
     *
     * @param array $arrDestinatarios ['example@mail.com', 'example2@mail.com => 'Example Name']
     * @param string $message
     * @return bool
     */
    public static function enviarEmail(array $arrDestinatarios, $assunto, $mensagem)
    {
        $host = MailConfig::getHost();
        $port = MailConfig::getPort();
        $encrypt = MailConfig::getEncryption();
        $username = MailConfig::getUser();
        $password = MailConfig::getPassword();
        $fromMail = MailConfig::getFromAddress();
        $fromName = MailConfig::getFromName();

        // Create the Transport
        $transport = new Swift_SmtpTransport($host, $port, $encrypt);
        $transport->setUsername($username)->setPassword($password);

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $swiftMessage = (new Swift_Message($assunto))
            ->setFrom([$fromMail => $fromName])
            ->setTo($arrDestinatarios)
            ->setBody($mensagem);


        // Send the message
        $result = $mailer->send($swiftMessage);

        return $result;
    }
}
