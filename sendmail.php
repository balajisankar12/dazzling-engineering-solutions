<?php

// Allow only POST request
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /contact.html");
    exit();
}

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

// Company email
$to = "dazzlingenggsolutions@gmail.com";
$subject = "New Enquiry from Website";

$body = "New Contact Form Submission\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n\n";
$body .= "Message:\n$message";

$headers = "From: no-reply@dazzlingenggsolutions.com\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send mail
if(mail($to, $subject, $body, $headers)) {

    // Redirect to thankyou page
    header("Location: thankyou.html?name=" . urlencode($name));
    exit();

} else {
    echo "Mail sending failed. Please try again later.";
}
?>
