<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    header('Content-Type: text/html; charset=utf-8');

    // Set the recipient email address
    $to = 'satyam8055thakur8055@gmail.com';  // Your email

    // Set the email subject
    $subject = "Contact Form Submission";

    // Sanitize and assign the POST data
    $name = !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = !empty($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $phone = !empty($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $mess = !empty($_POST['mess']) ? htmlspecialchars($_POST['mess']) : '';
    $ip = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user

    // Construct the email message
    $message = "Contact Form Submission:\n";
    $message .= "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Message: $mess\n";
    $message .= "IP Address: $ip\n";

    // Set the email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for contacting us. We will get back to you soon!";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }

} else {
    header('Location: contact.html');
    exit();
}
?>
