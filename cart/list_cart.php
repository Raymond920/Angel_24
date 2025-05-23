<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "angel_24");
    $no_quantity = true;

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the cart session variable exists
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Iterate over the cart items
        foreach ($_SESSION['cart'] as $pID => $quantity) {
            if ($quantity > 0) {
                $no_quantity = false;
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
                echo "<p>" . htmlspecialchars($pName) . "</p>";
                echo "<p>RM " . htmlspecialchars($price) . "</p>";
                echo "</div>";

                // Unique IDs for each form and element
                $quantityInputId = "quantity_" . htmlspecialchars($pID);

                // Quantity form with JavaScript to auto-submit
                echo '<form action="quantity_update.php" method="post" name="form_' . htmlspecialchars($pID) . '" class="quantity-form">';
                echo '<label for="' . $quantityInputId . '">Quantity:</label>';
                echo '<div class="quantity-selector">';
                echo '<button type="button" class="quantity-btn" onclick="adjustQuantity(' . htmlspecialchars($pID) . ', -1)">-</button>';
                echo '<input type="number" id="' . $quantityInputId . '" name="quantity" value="' . htmlspecialchars($quantity) . '" min="0" max="' . htmlspecialchars($stock) . '" onchange="this.form.submit()">';
                echo '<button type="button" class="quantity-btn" onclick="adjustQuantity(' . htmlspecialchars($pID) . ', 1)">+</button>';
                echo '</div>';
                echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($pID) . '">';
                echo '<input type="hidden" name="return_url" value="' . $current_url . '">';
                echo '</form>';
                echo "</div>";
            }
        }
        if (!$no_quantity) {
            echo '<div class="checkout-container">';
            echo '<a href="checkout.php" class="checkout-button">Proceed to Checkout</a>';
            echo '</div>';
        }
    }
    if ($no_quantity) {
        echo "<div class='cart-empty-container'>";
        echo "<p>Your cart is empty.</p>";
        echo "<img src='../images/sad_momoi.png'>";
        echo "</div>";
    }

    // Close the database connection
    $conn->close();
?>

<script>
function adjustQuantity(productId, change) {
    let input = document.getElementById('quantity_' + productId);
    let currentQuantity = parseInt(input.value) || 0;
    let newQuantity = currentQuantity + change;
    let maxQuantity = parseInt(input.max) || Infinity;

    if (newQuantity >= 0 && newQuantity <= maxQuantity) {
        input.value = newQuantity;
        input.dispatchEvent(new Event('change')); // Trigger change event to submit the form
    }
}
</script>
