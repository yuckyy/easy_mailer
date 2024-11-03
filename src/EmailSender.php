<?php

namespace EasyMiler;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSender
{
    private $mailer;

    public function __construct(array $smtpConfig)
    {
        $this->mailer = new PHPMailer(true);

        $this->mailer->isSMTP();
        $this->mailer->Host = $smtpConfig['host'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $smtpConfig['username'];
        $this->mailer->Password = $smtpConfig['password'];
        $this->mailer->SMTPSecure = $smtpConfig['encryption'];
        $this->mailer->Port = $smtpConfig['port'];
        $this->mailer->setFrom($smtpConfig['from_email'], $smtpConfig['from_name']);
        $this->mailer->isHTML(true);
    }

    public function send($email, $subject, $body)
    {
        try {
            $this->mailer->addAddress($email);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;
            $this->mailer->send();
            $this->mailer->clearAddresses();
            return true;
        } catch (Exception $e) {
            echo "Ошибка при отправке письма на {$email}: {$this->mailer->ErrorInfo}\n";
            return false;
        }
    }
}
