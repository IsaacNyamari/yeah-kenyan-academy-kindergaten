<?php
require "../includes/functions.php";
$data = file_get_contents('php://input');
$data = json_decode($data, true);
$name = strip_tags(htmlspecialchars($data['name']));

$email = strip_tags(htmlspecialchars($data['email']));
$m_subject = strip_tags(htmlspecialchars($data['subject']));
$message = strip_tags(htmlspecialchars($data['message']));
$mailer = new Mailer();
$mailer->sendMail(
  null,
  'jablessions76@gmail.com', // Replace with actual recipient email if needed
  $name,
  $m_subject,
  $email,
  $message
);
