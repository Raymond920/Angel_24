<link rel="stylesheet" href="../style/mystyle1.css">
<link rel="stylesheet" href="../style/displayItem.css">
<?php
    $conn = mysqli_connect("localhost", "root", "", "angel_24");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("SELECT Product_ID, Product_Name, Product_Image, Price FROM products");

    // Execute the statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($pID, $pName, $pImage, $price);

    echo "<article class='display-item-page fade-in'>";
    echo "<section class='bg-frame'>";
    // Display title
    echo "<h1 class='title'><div class='inner'>Discover</div></h1>";
    
    echo "<div class='itemListContainer'>";
    while ($stmt->fetch()) {
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
    echo "<br><br>";
    echo "</section>";
    echo "</article>";

    // Close connections
    $stmt->close();
    $conn->close();
    
?>