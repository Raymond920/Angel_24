<?php
session_start(); // Start the session

// Check if the form was submitted and if 'product_id' and 'quantity' are set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = (int) $_POST['product_id'];
    $newQuantity = (int) $_POST['quantity']; // Get the new quantity input by the user

    // Ensure quantity is non-negative
    $newQuantity = max($newQuantity, 0);

    // Update the cart with the new quantity
    $_SESSION['cart'][$productId] = $newQuantity;
}

// Redirect back to the previous page
header('Location: ' . urldecode($_POST['return_url']));
exit();
?>
