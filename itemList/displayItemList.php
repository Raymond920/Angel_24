<?php 
session_start();
//Check if the user is not logged in
if(!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Item List</title>
        <link rel="stylesheet" href="../style/mystyle1.css">
        <link rel="stylesheet" href="../style/animation.css">
        <link rel="stylesheet" href="../style/displayItem.css">
    </head>
    <body>
        
        <?php include("../includes/header.php"); ?>
        <?php include("../includes/navigation.php"); ?>

        <div>
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

                    echo "<article class='display-item-page'>";
                    echo "<section class='bg-frame'>";
                    // Display title
                    echo "<h1 class='title'><div class='inner glitch'><span>$product_type</span></div></h1>";
                    
                    echo "<div class='itemListContainer fade-in'>";
                    $i = 0;
                    while ($stmt->fetch()) {
                        // Wrap the item card with an anchor tag
                        echo "<a href='itemDetail.php?product_id=$pID' class='item-link'>";
                        if ($i < 12){
                            echo "<div class='item-card' id='$pID'>";
                            $i += 1;
                        } else {
                            echo "<div class='item-card fade-in-element' id='$pID'>";
                        }
                        echo "<img src='$pImage' alt='$pName'>";
                        echo "<h4>$pName</h4>";
                        echo "<p>RM $price</p>";
                        echo "</div>";
                        echo "</a>";
                    }
                    echo "</div>";
                    echo "<br><br>";
                    echo "</section>";
                    echo "</article>";

                    // Close connections
                    $stmt->close();
                    $conn->close();
                }
            ?>
        </div>
        <script src="../javascript/animation.js"></script>
    </body>
</html>