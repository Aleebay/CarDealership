<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $car = $_POST['car'];
    $service = $_POST['Select_a_Service'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $message = $_POST['message'];

    // You can perform further validation and data processing here

    // For this example, we'll just display a response message
    echo "<h2>Form Submission Confirmation</h2>";
    echo "<p>Thank you, $name, for your inquiry!</p>";
    echo "<p>You're interested in a $car and would like to $service on $date at $time.</p>";
    echo "<p>We've received your message:</p>";
    echo "<p><em>$message</em></p>";
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['success']) && $_GET['success'] === 'true') {
    // Display a success message if redirected from process_inquiry.php
    echo "<h2>Success!</h2>";
    echo "<p>Your inquiry has been sent.</p>";
    echo "<p>We'll get back to you shortly.</p>";
} else {
    // Handle invalid requests (direct access to the script without form submission)
    echo "Invalid request. Please submit the form from the inquiry page.";
}
?>
