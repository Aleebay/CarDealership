<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arial, sans-serif">
    <!-- link to external CSS file here -->
    <link rel="stylesheet" type="text/css" href="inventory.css">
    
    
    <title>Car Inventory</title>
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
    <hr>
    <h1>Car Inventory</h1>
    <hr>

    <div class="inventory-container">
        <?php
        $cars = array(
            "Toyota" => array(
                array(
                    "Model" => "Corolla",
                    "Year" => 2023,
                    "Price" => "$25,000",
                    "Mileage" => "10,000 miles",
                    "Fuel Type" => "Gasoline",
                    "Transmission" => "Automatic",
                    "Image" => "pix1.jpg",
                ),
            ),
            "Ford" => array(
                array(
                    "Model" => "Fusion",
                    "Year" => 2023,
                    "Price" => "$26,500",
                    "Mileage" => "12,000 miles",
                    "Fuel Type" => "Gasoline",
                    "Transmission" => "Automatic",
                    "Image" => "pix2.jpg",
                ),
            ),
            "Mazda" => array(
                array(
                    "Model" => "Mazda3",
                    "Year" => 2023,
                    "Price" => "$24,800",
                    "Mileage" => "9,000 miles",
                    "Fuel Type" => "Gasoline",
                    "Transmission" => "Automatic",
                    "Image" => "pix3.jpg",
                ),
            ),
            "Benz" => array(
                array(
                    "Model" => "C-Class",
                    "Year" => 2023,
                    "Price" => "$35,500",
                    "Mileage" => "7,500 miles",
                    "Fuel Type" => "Gasoline",
                    "Transmission" => "Automatic",
                    "Image" => "pix4.jpg",
                ),
            ),
            "BMW" => array(
                array(
                    "Model" => "3 Series",
                    "Year" => 2023,
                    "Price" => "$33,000",
                    "Mileage" => "8,000 miles",
                    "Fuel Type" => "Gasoline",
                    "Transmission" => "Automatic",
                    "Image" => "pix5.jpg",
                ),
            ),
            "Honda" => array(
                array(
                    "Model" => "C-Class",
                    "Year" => 2023,
                    "Price" => "$35,500",
                    "Mileage" => "7,500 miles",
                    "Fuel Type" => "Gasoline",
                    "Transmission" => "Automatic",
                    "Image" => "pix4.jpg",
                ),
            ),
            "Nissan" => array(
                array(
                    "Model" => "3 Series",
                    "Year" => 2023,
                    "Price" => "$33,000",
                    "Mileage" => "8,000 miles",
                    "Fuel Type" => "Gasoline",
                    "Transmission" => "Automatic",
                    "Image" => "pix5.jpg",
                ),
            ),
            "Opel" => array(
                array(
                    "Model" => "3 Series",
                    "Year" => 2023,
                    "Price" => "$33,000",
                    "Mileage" => "8,000 miles",
                    "Fuel Type" => "Gasoline",
                    "Transmission" => "Automatic",
                    "Image" => "pix5.jpg",
                ),
            )
        );

        echo '<div class="car-brands">';
        foreach ($cars as $brand => $car_list) {
            echo '<div class="car-brand">' . $brand . '</div>';
        }
        echo '</div>';

        echo '<div class="car-list">';
        foreach ($cars as $brand => $car_list) {
            foreach ($car_list as $car) {
                echo '<div class="car-item">';
                echo '<img class="car-image" src="' . $car["Image"] . '" alt="' . $brand . ' ' . $car["Model"] . '">';
                echo '<div class="car-characteristics">';
                echo '<div class="car-characteristic">Make/Brand: ' . $brand . '</div>';
                echo '<div class="car-characteristic">Model: ' . $car["Model"] . '</div>';
                echo '<div class="car-characteristic">Year: ' . $car["Year"] . '</div>';
                echo '<div class="car-characteristic">Price: ' . $car["Price"] . '</div>';
                echo '<div class="car-characteristic">Mileage: ' . $car["Mileage"] . '</div>';
                echo '<div class="car-characteristic">Fuel Type: ' . $car["Fuel Type"] . '</div>';
                echo '<div class="car-characteristic">Transmission: ' . $car["Transmission"] . '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        echo '</div>';
        ?>
    </div>
    <!-- Car Inventory Section -->
    <div class="inventory-header">
        <h2>Available Cars</h2>
        <hr>
    </div>
    <?php
    try {
        // Database Connection
        $pdo = new PDO("pgsql:host=localhost;port=5433;dbname=CarDealership;user=postgres;password=mydatabase");
        
        // Check if the "Add Car" button is clicked
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_car'])) {
            $make_brand = $_POST['make_brand'];
            $model = $_POST['model'];
            $year = $_POST['year'];
            $price = $_POST['price'];
            $mileage = $_POST['mileage'];
            $fuel_type = $_POST['fuel_type'];
            $transmission = $_POST['transmission'];
            
            // Prepare and execute a query to insert a new car
            $query = "INSERT INTO cars (make_brand, model, year, price, mileage, fuel_type, transmission) 
                      VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$make_brand, $model, $year, $price, $mileage, $fuel_type, $transmission]);
            
            // Redirect to refresh the page and show the updated table
            header("Location: inventory.php");
            exit();
        }
        
        // Check if the "Delete Car" button is clicked
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_car'])) {
            $delete_id = $_POST['delete_id'];
            
            // Prepare and execute a query to delete the car by ID
            $query = "DELETE FROM cars WHERE car_id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$delete_id]);
            
            // Redirect to refresh the page and show the updated table
            header("Location: inventory.php");
            exit();
        }
        
        // Prepare and execute a query to select all cars
        $query = "SELECT car_id, make_brand, model, year, price, mileage, fuel_type, transmission FROM cars";
        $stmt = $pdo->query($query);
        
        // Check if there are any results
        if ($stmt->rowCount() > 0) {
            echo "<table>";
            echo "<tr><th>Car ID</th><th>Make/Brand</th><th>Model</th><th>Year</th><th>Price</th><th>Mileage</th><th>Fuel Type</th><th>Transmission</th></tr>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['car_id'] . "</td>";
                echo "<td>" . $row['make_brand'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>$" . number_format($row['price'], 2) . "</td>";
                echo "<td>" . $row['mileage'] . " miles</td>";
                echo "<td>" . $row['fuel_type'] . "</td>";
                echo "<td>" . $row['transmission'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No car records found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
    <main>
        <!-- Form to add a new car -->
        <hr>
        <h2>Add Car</h2>
        <hr>
        <form method="post">
            Make/Brand: <input type="text" name="make_brand" required>
            Model: <input type="text" name="model" required>
            Year: <input type="number" name="year" required>
            Price: <input type="text" name="price" required>
            Mileage: <input type="text" name="mileage" required>
            Fuel Type: <input type="text" name="fuel_type" required>
            Transmission: <input type="text" name="transmission" required>
            <input type="submit" name="add_car" value="Add Car">
        </form>
        <!-- Form to delete a car -->
        <hr>
        <h2>Delete Car</h2>
        <hr>
        <form method="post">
            Car ID to Delete: <input type="number" name="delete_id" required>
            <input type="submit" name="delete_car" value="Delete Car">
        </form>
    </main>
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
