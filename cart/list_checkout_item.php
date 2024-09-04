<link rel="stylesheet" href="../style/checkout_item.css">
<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "angel_24");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "<div class='checkout-item'>";
    echo "<h4>Item: </h4>";
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $total_price = 0;

        // Iterate over the cart items
        foreach ($_SESSION['cart'] as $pID => $quantity) {
            if ($quantity > 0) {
                $no_quantity = true;
                // Fetch item details from the database
                $stmt = $conn->prepare("SELECT Product_Name, Product_Image, Price, Stock FROM products WHERE Product_ID = ?");
                $stmt->bind_param("i", $pID);
                $stmt->execute();
                $stmt->bind_result($pName, $pImage, $price, $stock);
                $stmt->fetch();
                $stmt->close();

                // Display item details
                echo "<div class='product-row'>";
                    echo "<img src='" . htmlspecialchars($pImage) . "' alt='" . htmlspecialchars($pName) . "' >";
                    echo "<div class='name-price-container'>";
                        echo "<p>".htmlspecialchars($pName)."</p>";
                        echo "<p>Quantity: ".htmlspecialchars($quantity)."</p>";
                    echo "</div>";
                    echo "<div class='price-container'>";
                        echo "<p>RM " . htmlspecialchars(number_format($price * $quantity, 2)) . "</p>";
                    echo "</div>";
                echo "</div>";
                $total_price += $price * $quantity;
            }
        }
        echo "<div class='total-price-container'>";
            echo "<p class='total-price'>TOTAL: RM ". htmlspecialchars(number_format($total_price, 2)) . "</p>";
        echo "</div>";
    }
    if (!$no_quantity) {
        echo "<p>Your cart is empty.</p>";
    }
    echo "</div>";

    // Close the database connection
    $conn->close();
?>
