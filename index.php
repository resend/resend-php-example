<?php

// Include Composer autoload file to load Resend SDK classes...
require __DIR__ . '/../vendor/autoload.php';

// Assign a new Resend Client instance to $resend variable, which is automatically autoloaded...
$resend = Resend::client($_ENV['RESEND_API_KEY']);

try {
    $result = $resend->emails->send([
        'from' => 'onboarding@resend.dev',
        'to' => 'delivered@resend.dev',
        'subject' => 'Hello world',
        'html' => '<strong>It works!</strong>',
    ]);
} catch (\Exception $e) {
    exit('Error: ' . $e->getMessage());
}

// Get the ID of the sent email to be saved in a log...
$result->id;
