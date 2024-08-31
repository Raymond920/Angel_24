<?php
    session_start(); // Start the session

    // Check if the form was submitted and if 'product_id' is set
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
        $productId = (int) $_POST['product_id'];
        $currentQuantity = (int) $_SESSION['cart'][$productId];

        // Increase quantity
        if (isset($_POST['increase'])) {
            $_SESSION['cart'][$productId] = $currentQuantity + 1;
        }
        
        // Decrease quantity
        if (isset($_POST['decrease'])) {
            $_SESSION['cart'][$productId] = max($currentQuantity - 1, 0);
        }
    }

    // Redirect back to the previous page
    header('Location: ' . urldecode($_POST['return_url']));
    exit();
?>
