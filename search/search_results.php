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
    <title>Search Results</title>
    <link rel="stylesheet" href="../style/mystyle1.css">
    <link rel="stylesheet" href="../style/animation.css">
    <link rel="stylesheet" href="../style/displayItem.css">
</head>
<body>

    <!-- Include header and navigation bar -->
    <?php include("../includes/header.php"); ?>
    <?php include("../includes/navigation.php"); ?>

    <div class="content">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
            // Get the search query from the query string and sanitize it
            $search = htmlspecialchars($_GET['search']);

            // Connect to the database
            $conn = mysqli_connect("localhost", "root", "", "angel_24");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Prepare the SQL statement with wildcards for a search
            $search_param = "%" . $search . "%";
            $stmt = $conn->prepare("SELECT Product_ID, Product_Name, Product_Image, Price FROM products WHERE Product_Name LIKE ? OR Product_type LIKE ?");
            $stmt->bind_param("ss", $search_param, $search_param);

            // Execute the statement
            $stmt->execute();

            // Bind result variables
            $stmt->bind_result($pID, $pName, $pImage, $price);
            echo "<article class='display-item-page'>";
            echo "<section class='bg-frame'>";
            // Display title
            echo "<h1 class='search-result'><div class='inner glitch'><span>Search Results for: $search</span></div></h1>";

            // Display items
            echo "<div class='itemListContainer'>";
            $resultsFound = false;
            $i = 0;
            while ($stmt->fetch()) {
                $resultsFound = true;
                // Wrap the item card with an anchor tag
                echo "<a href='../itemList/itemDetail.php?product_id=$pID' class='item-link'>";
                if ($i < 12) {
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

            // If no results were found, display a message
            if (!$resultsFound) {
                echo "<h4>No results found for your search.</h4>";
            }
            echo "<br><br>";
            echo "</section>";
            echo "</article>";
            // Close connections
            $stmt->close();
            $conn->close();
            echo "</div>";
        } else {
            echo "<p>No search query entered.</p>";
        }
        ?>
    </div>
    <script src="../javascript/animation.js"></script>
</body>
</html>
