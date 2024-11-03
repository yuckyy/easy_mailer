<?php

use EasyMiler\EmailTemplate;

$services = require __DIR__ . '/bootatrap/bootstrap.php';

$db = $services['db'];
$emailSender = $services['emailSender'];
$emails = $db->getEmails();

$templatePath = __DIR__ . '/templates/email_template.php';

foreach ($emails as $email) {

    if ($email) {

        $data = [
            'name' => $email,
            'bodyContent' => '',
            'subject' => '',
        ];

        $emailTemplate = EmailTemplate::fromFile($templatePath, $data);

        $emailSender->send($email, $emailTemplate->getSubject(), $emailTemplate->getBody());
    } else {

        error_log('Invalid email data: ' . print_r($email, true));
    }
}

echo "Spam is Finished";
