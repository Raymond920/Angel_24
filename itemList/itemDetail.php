<?php 
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['product_id'])) {
        // Get the product type from the query string
        $pID = $_GET['product_id'];

        // Ensure the variable is safe to use
        $pID = htmlspecialchars($pID);

        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "angel_24");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else 

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("SELECT Product_Name, Product_Image, Description, Price, Stock FROM products WHERE Product_ID = ?");
        $stmt->bind_param("i", $pID);

        // Execute the statement
        $stmt->execute();

        // Bind result variables
        $stmt->bind_result($pName, $pImage, $description, $price, $stock);

        // Fetch the result
        if ($stmt->fetch()) {

        } else {
            echo "<p>No product found with the given ID.</p>";
        }
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?php echo htmlspecialchars($pName); ?></title>
        <link rel="stylesheet" href="../style/itemDetail.css">
        <link rel="stylesheet" href="../style/quantitySelector.css">
    </head>
    <body>
        <div class="item-description-container">
            <div class="image-detail-container">
                <div class="image-container">
                    <img src="<?php echo htmlspecialchars($pImage); ?>" alt="<?php echo htmlspecialchars($pName); ?>">
                </div>
                <div class="detail-container">
                    <h2><?php echo htmlspecialchars($pName); ?></h2>
                    <p>RM<?php echo htmlspecialchars($price); ?></p>
                    <p>Stock left: <?php echo htmlspecialchars($stock); ?></p>
                    <h2>Description:</h2>
                    <article><?php echo htmlspecialchars($description); ?></article>

                    <form action="addToCart.php" method="post" class="quantity-form">
                        <label for="quantity">Quantity:</label>
                        <div class="quantity-selector">
                            <button type="button" class="quantity-btn" id="decrease">-</button>
                            <input type="number" id="quantity" name="quantity" value="0" min="0" step="1">
                            <button type="button" class="quantity-btn" id="increase">+</button>
                        </div>
                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($pID) ?>"> <!-- Hidden field for product ID -->
                        <button type="submit" value="quantity">Add to Cart</button>
                    </form>
                    <script src="quantitySelector.js"></script> <!-- Link to JavaScript file -->

                </div>
            </div>
        </div>
    </body>
</html>