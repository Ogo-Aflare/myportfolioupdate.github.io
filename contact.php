<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $phonenumber = htmlspecialchars($_POST['phonenumber']);

    // Define the recipient email and subject
    $to = "ogooluwapeter@gmail.com";  // Replace with your email address
    $subject = "New Contact Form Submission";

    // Create the email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Create the email body
    $body = "<h2>Contact Form Submission</h2>";
    $body .= "<p><strong>Name:</strong> {$name}</p>";
    $body .= "<p><strong>Email:</strong> {$email}</p>";
    $body .= "<p><strong>Message:</strong> {$message}</p>";

    // Send the email
   // Send the email and redirect with status
    if (mail($to, $subject, $body, $headers)) {
        header("Location: contact.html?status=success");
    } else {
        header("Location: contact.html?status=error");
    }
} else {
    echo "Invalid request.";
}
?>
