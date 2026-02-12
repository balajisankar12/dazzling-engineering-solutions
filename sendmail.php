<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $message = strip_tags($_POST['message']);

    // Company email
    $to = "dazzlingenggsolutions@gmail.com";
    $subject = "New Customer Enquiry from Website";

    $body = "You have received a new message:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";

    $headers = "From: no-reply@dazzlingenggsolutions.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send mail to company
    mail($to, $subject, $body, $headers);

    // Auto reply to customer
    $replySubject = "Thank You for Contacting Dazzling Engineering Solutions";

    $replyMessage = "Dear $name,\n\n";
    $replyMessage .= "Thank you for visiting our website.\n";
    $replyMessage .= "We have received your message and our team will contact you shortly.\n\n";
    $replyMessage .= "Best Regards,\n";
    $replyMessage .= "Dazzling Engineering Solutions Team";

    $replyHeaders = "From: dazzlingenggsolutions@gmail.com\r\n";

    mail($email, $replySubject, $replyMessage, $replyHeaders);

    // Redirect to thankyou page with name
    header("Location: thankyou.html?name=" . urlencode($name));
    exit();
}
?>
