<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" href="../style/mystyle1.css">
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

            // Display title
            echo "<h3>Search Results for: $search</h3>";

            // Display items
            echo "<div class='itemListContainer'>";
            $resultsFound = false;
            while ($stmt->fetch()) {
                $resultsFound = true;
                // Wrap the item card with an anchor tag
                echo "<a href='../itemList/itemDetail.php?product_id=$pID' class='item-link'>";
                echo "<div class='item-card' id='$pID'>";
                echo "<img src='$pImage' alt='$pName'>";
                echo "<h4>$pName</h4>";
                echo "<p>RM $price</p>";
                echo "</div>";
                echo "</a>";
            }
            echo "</div>";

            // If no results were found, display a message
            if (!$resultsFound) {
                echo "<h4>No results found for your search.</h4>";
            }

            // Close connections
            $stmt->close();
            $conn->close();
        } else {
            echo "<p>No search query entered.</p>";
        }
        ?>
    </div>

</body>
</html>
