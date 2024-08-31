<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $product_id = isset($_POST['product_id']) ? htmlspecialchars($_POST['product_id']) : '';
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;


    // Validate the quantity
    if ($quantity < 0) {
        $quantity = 0; // Ensure the quantity is non-negative
    }

    // Initialize the cart in session if it does not exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if the product is already in the session cart
    if (isset($_SESSION['cart'][$product_id])) {
        // If it exists, add the new quantity to the existing quantity
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        // If it doesn't exist, add it to the cart with the new quantity
        $_SESSION['cart'][$product_id] = $quantity;
    }

    // No database actions are needed as we're not storing the cart in the database

} else {
    echo "Invalid request.";
}

// Back to return URL
$return_url = isset($_POST["return_url"]) ? urldecode($_POST["return_url"]) : ''; // Return URL
header('Location: ' . $return_url);
?>
