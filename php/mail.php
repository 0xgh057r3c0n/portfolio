<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate the input
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required!";
        exit;
    }

    // Email details
    $to = 'gauravbhattacharjee54@gmail.com';  // Replace with your email address
    $subject = 'New Contact Form Submission';
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Create the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Message could not be sent. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
