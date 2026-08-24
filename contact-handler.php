<?php
// Contact form handler for Ugly Duckling Restorations.
// PLACEHOLDER: replace $recipient with the real business inbox before launch.
$recipient = 'hello@uglyducklingrestorations.com';

header('Content-Type: text/plain');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed');
}

function clean($value) {
    $value = trim($value ?? '');
    // strip header-injection attempts (newlines) from single-line fields
    return preg_replace('/[\r\n]+/', ' ', $value);
}

$name = clean($_POST['name'] ?? '');
$phone = clean($_POST['phone'] ?? '');
$email = clean($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');
$honeypot = trim($_POST['website'] ?? '');

// Bots that fill the hidden honeypot field get a fake success, no email sent.
if ($honeypot !== '') {
    http_response_code(200);
    exit('OK');
}

if ($name === '' || $email === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit('Please fill in your name, a valid email, and a message.');
}

$subject = 'New restoration inquiry from ' . $name;
$body = "Name: $name\nPhone: $phone\nEmail: $email\n\nMessage:\n$message\n";
$headers = "From: Ugly Duckling Restorations Website <no-reply@uglyducklingrestorations.com>\r\n";
$headers .= 'Reply-To: ' . $email . "\r\n";

$sent = mail($recipient, $subject, $body, $headers);

if ($sent) {
    http_response_code(200);
    exit('OK');
}

http_response_code(500);
exit('Message could not be sent. Please try again or contact us by phone.');
