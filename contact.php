<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "Info@devconix.in"; // Replace with your email
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email content
    $emailBody = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

    // Send email
    if (mail($to, $subject, $emailBody, $headers)) {
        // Success message
        echo "<script>
                alert('Message sent successfully!');
                window.location.href = 'index.html'; // Replace with your homepage URL
              </script>";
    } else {
        // Failure message
        echo "<script>
                alert('Failed to send the message. Please try again later.');
                window.location.href = 'index.html'; // Replace with your homepage URL
              </script>";
    }
} else {
    // Invalid request method
    echo "<script>
            alert('Invalid request method.');
            window.location.href = 'index.html'; // Replace with your homepage URL
          </script>";
}
?>
