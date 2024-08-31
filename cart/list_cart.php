<?php
    session_start(); // Start the session

    // Check if the cart session variable exists
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo "<table>";
        echo "<thead><tr><th>Item ID</th><th>Quantity</th></tr></thead>";
        echo "<tbody>";

        // Iterate over the cart items
        foreach ($_SESSION['cart'] as $item_id => $quantity) {
            if ($quantity > 0){
                echo "<tr>";
                echo "<td>" . htmlspecialchars($item_id) . "</td>";
                echo "<td>" . htmlspecialchars($quantity) . "</td>";
                echo "</tr>";
            }
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Your cart is empty.</p>";
    }
?>