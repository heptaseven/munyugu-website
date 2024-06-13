<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate CSRF token (This is just a basic example; in a real application, you would generate and validate CSRF tokens securely)
    session_start();
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token validation failed.");
    }

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Email recipient
    $to = "josephkamunyu3600@gmail.com";

    // Email subject
    $email_subject = "New message from Munyugu Events Contact Form";

    // Email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Number: $number\n";
    $email_message .= "Subject: $subject\n";
    $email_message .= "Message:\n$message";

    // Additional headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $email_subject, $email_message, $headers)) {
        // Email sent successfully
        echo "Thank you! Your message has been sent.";
    } else {
        // Failed to send email
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    // Redirect back to the contact page if the form is not submitted
    header("Location: contact.html");
    exit;
}
?>
