<?php
  // Configuration
  $toEmail = 'your_email@example.com'; // Replace with your email address
  $subject = 'Contact Form Submission';

  // Check if the form is submitted
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate the input data
    if (empty($name) || empty($email) || empty($message)) {
      $error = 'Please fill in all the fields.';
    } else {
      // Send the email
      $headers = 'From: ' . $email . "\r\n" .
                 'Reply-To: ' . $email . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
      $body = "Name: $name\nEmail: $email\nMessage: $message";
      mail($toEmail, $subject, $body, $headers);

      // Display a success message
      $success = 'Thank you for contacting us! We will get back to you soon.';
    }
  }
?>