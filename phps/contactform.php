<?php

function processMail($from, $subject, $body)
{
    $message = "
    <html>
    <head>
    <title>$subject</title>
    </head>
    <body>$body</body>
    </html>
    ";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";

    // More headers
    $headers .= "From: $from\r\n";
    $headers .= "Cc: myboss@example.com\r\n";

    mail('itsfeat@gmail.com', $subject, $message, $headers);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'contact-mail', FILTER_VALIDATE_EMAIL);
    $subject = filter_input(INPUT_POST, 'contact-subject', FILTER_SANITIZE_STRING);
    $body = filter_input(INPUT_POST, 'contact-msg', FILTER_SANITIZE_STRING);

    if ($email && $body) {
        processMail($email, $subject, $body);
    } else {
        echo "Invalid email, subject or message!";
    }
} else {
    echo "Invalid request method";
}

?>