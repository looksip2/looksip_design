<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "retrysa101@gmail.com"; // Email tujuan
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n".
        "Here are the details:\n\n".
        "Name: $name\n\n".
        "Email: $email\n\n".
        "Subject: $m_subject\n\n".
        "Message: $message";

$header = "From: $email\r\n";
$header .= "Reply-To: $email\r\n";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
