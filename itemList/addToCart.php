<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $product_id = isset($_POST['product_id']) ? htmlspecialchars($_POST['product_id']) : '';
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;

    // Validate the quantity
    if ($quantity < 0) {
        $quantity = 0; // Ensure the quantity is non-negative
    }

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "angel_24");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Process the data (e.g., add to cart logic)
    // For demonstration, let's just echo the values
    // echo "<p>Product ID: $product_id</p>";
    // echo "<p>Quantity: $quantity</p>";

    // You would typically insert this data into a cart table or session here

    // Close the connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
