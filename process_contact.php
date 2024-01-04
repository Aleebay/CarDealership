<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // You can perform further validation and data processing here

    // For this example, we'll just display a response message
    echo "<h2>Message Sent</h2>";
    echo "<p>Thank you, $name, for your message!</p>";
    echo "<p>We have received your message:</p>";
    echo "<p><em>$message</em></p>";
} else {
    // Handle invalid requests (direct access to the script without form submission)
    echo "Invalid request. Please submit the form from the contact page.";
}
?>
