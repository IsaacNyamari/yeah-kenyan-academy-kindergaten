<?php 
require "../includes/functions.php";
function sendSampleEmail()
{
    $mailer = new Mailer();
    $to = 'jablessions76@gmail.com';
    $subject = 'Test Email';
    $body = 'This is a test email.';
    $mailer->sendMail(null, $to, $subject, $body);
}
sendSampleEmail();