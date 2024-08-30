<?php 
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['product_type'])) {
        // Get the product type from the query string
        $product_type = $_GET['product_type'];

        // Ensure the variable is safe to use
        $product_type = htmlspecialchars($product_type);

        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "angel_24");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("SELECT Product_ID, Product_Name, Product_Image, Price FROM products WHERE Product_Type = ?");
        $stmt->bind_param("s", $product_type);

        // Execute the statement
        $stmt->execute();

        // Bind result variables
        $stmt->bind_result($pID, $pName, $pImage, $price);
    }


?>