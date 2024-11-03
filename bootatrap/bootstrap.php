<?php


require_once __DIR__ . '/../vendor/autoload.php';

use EasyMiler\Database;
use EasyMiler\EmailTemplate;
use EasyMiler\EmailSender;

$config = require __DIR__ . '/../config/config.php';

function initServices($config)
{

    $db = new Database($config['database']);
    $emailSender = new EmailSender($config['smtp']);

    return [
        'db' => $db,
        'emailSender' => $emailSender,
    ];
}

return initServices($config);
