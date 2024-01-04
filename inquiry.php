<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arial, sans-serif">
    <!-- link to external CSS file here -->
    <link rel="stylesheet" type="text/css" href="inquiry.css">
    
     <script>
        function showMessage() {
            alert("Inquiry/Reservation sent");
        }
    </script>
   

    <title>Inquiry</title>
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
    <h1>Inquiries</h1>

    <!-- Contact Form Section -->
    <div class="inventory-header">
        <h2>Reservations and Inquiries</h2>
    </div>
    <div class="inventory-container">
        <div class="contact-form">
            <h3>Contact Us</h3>
            <form method="post" action="process_inquiry.php" onsubmit="showMessage()">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
                <label for="car">Car of Interest:</label>
                <select id="car" name="car" required>
                    <option value="--Select A Car--">Select A Car</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Ford">Ford</option>
                    <option value="Honda">Honda</option>
                    <option value="benz">Benz</option>
                    <option value="BMW">BMW</option>
                    <option value="Mazda">Mazda</option>
                    <option value="Opel">Opel</option>
                    <option value="Nissan">Nissan</option>
                    <!-- Add options for other cars -->
                </select>
                <label for="Services">Services:</label>
                <select id="Select_a_Service" name="Select_a_Service">
                    <option value="Book a Test Drive">Book a Test Drive</option>
                    <option value="Book a Car Inspection">Book a Car Inspection</option>
                    <option value="Book for Car Maintenance">Book for Car Maintenance</option>
                    <option value="Book for Car Upgrade">Book for a car upgrade</option>
                    <!-- Add more options as needed -->
                </select>
                <label for="Date">Date:</label>
                <input type="date" id="date" name="date" required>

                <label for="Time">Time:</label>
                <select id="time" name="time" required>
                <option value="10:00 AM">10:00 AM</option>
                <option value="11:00 AM">11:00 AM</option>
                <option value="12:00 PM">12:00 PM</option>
                <option value="01:00 PM">01:00 PM</option>
                <option value="02:00 PM">02:00 PM</option>
                <option value="03:00 PM">03:00 PM</option>
                <option value="04:00 PM">04:00 PM</option>
                </select>

                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
    
    <?php
    if (isset($_GET['success'])) {
        if ($_GET['success'] === 'true') {
            echo '<p>Thank you for your inquiry. We will get back to you shortly.</p>';
        } elseif ($_GET['success'] === 'false') {
            echo '<p>There was an error processing your inquiry. Please try again later.</p>';
        }
    }
    ?>

    <footer>
        <nav>
            <ul>
                <li><a href="privacy.php">Privacy Policy</a></li>
                <li><a href="terms.php">Terms of Service</a></li>
                <li><a href="sitemap.php">Sitemap</a></li>
            </ul>
        </nav>
    </footer>
</body>
</html>
