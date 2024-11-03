<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

return [
    'database' => [
        'host' => $_ENV['DB_HOST'],
        'dbname' => $_ENV['DB_NAME'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'charset' => $_ENV['DB_CHARSET'],
    ],
    'smtp' => [
        'host' => $_ENV['SMTP_HOST'],
        'username' => $_ENV['SMTP_USERNAME'],
        'password' => $_ENV['SMTP_PASSWORD'],
        'port' => $_ENV['SMTP_PORT'],
        'encryption' => $_ENV['SMTP_ENCRYPTION'],
        'from_email' => $_ENV['SMTP_FROM_EMAIL'],
        'from_name' => $_ENV['SMTP_FROM_NAME'],
    ],
];
