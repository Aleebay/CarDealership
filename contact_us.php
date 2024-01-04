<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arial, sans-serif">
    <!-- link to external CSS file here -->
    <link rel="stylesheet" type="text/css" href="contact.css">
    
    <script>
        function showMessage() {
            alert("Message sent");
        }
    </script>
    <title>Contact Us</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="inventory.php">Inventory</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="inquiry.php">Inquiry</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <!-- Add links to other sections of the website as needed -->
            </ul>
        </nav>
    </header>
    <div class="inventory-header">
        <h1>Contact Us</h1>
    </div>
    <div class="inventory-container">
        <h2>Send us a Message</h2>
        <form method="post" action="process_contact.php" onsubmit="showMessage()">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <input type="submit" name="submit" value="Send Message">
        </form>
    </div>
    
    <?php
    if (isset($_GET['success'])) {
        if ($_GET['success'] === 'true') {
            echo '<p>Thank you for your message. We will get back to you shortly.</p>';
        } elseif ($_GET['success'] === 'false') {
            echo '<p>There was an error sending your message. Please try again later.</p>';
        }
    }
    ?>

<footer>
        <nav>
            <ul>
                <li><a href="privacy.php">Privacy Policy</a></li>
                <li><a href="terms.php">Terms of Service</a></li>
                <li><a href="sitemap.php">Sitemap</a></li>
                <!-- Add more links to legal and informative pages -->
            </ul>
        </nav>
    </footer>
</body>
</html>
