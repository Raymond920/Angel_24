<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/mystyle1.css">
</head>
<body>
    <?php include("../includes/header.php"); ?>
    <?php include("../includes/navigation.php"); ?>

    <h1>Cart</h1>

    <?php
    session_start(); // Start the session

    // Check if the cart session variable exists
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo "<table>";
        echo "<thead><tr><th>Item ID</th><th>Quantity</th></tr></thead>";
        echo "<tbody>";

        // Iterate over the cart items
        foreach ($_SESSION['cart'] as $item_id => $quantity) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item_id) . "</td>";
            echo "<td>" . htmlspecialchars($quantity) . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>

</body>
</html>
