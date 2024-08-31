<?php
    session_start(); // Start the session

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "angel_24");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "<div class='cart-item'>";

    // Check if the cart session variable exists
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

        // Iterate over the cart items
        foreach ($_SESSION['cart'] as $pID => $quantity) {
            if ($quantity > 0) {
                // Fetch item details from the database
                $stmt = $conn->prepare("SELECT Product_Name, Product_Image, Price FROM products WHERE Product_ID = ?");
                $stmt->bind_param("i", $pID);
                $stmt->execute();
                $stmt->bind_result($pName, $pImage, $price);
                $stmt->fetch();
                $stmt->close();

                // Display item details
                echo "<div class='" . htmlspecialchars($pID) ."'>";
                echo "<img src='" . htmlspecialchars($pImage) . "' alt='" . htmlspecialchars($pName) . "' style='width: 100px; height: auto;'>";
                echo "" . htmlspecialchars($pName) . "";
                echo "" . htmlspecialchars($price) . "";
                echo "" . htmlspecialchars($quantity) . "";
                echo "</div>";
            }
        }
    } else {
        echo "<p>Your cart is empty.</p>";
    }

    echo "</div>";

    // Close the database connection
    $conn->close();
?>
