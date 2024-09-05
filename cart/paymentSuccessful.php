<?php 
    session_start();

    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "angel_24");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

        // Iterate over the cart items
        foreach ($_SESSION['cart'] as $pID => $quantity) {
            if ($quantity > 0) {
                // Fetch item details from the database
                // UPDATE `products` SET `Stock` = '101' WHERE `products`.`Product_ID` = 1
                $stmt = $conn->prepare("SELECT Stock FROM products WHERE Product_ID = ?");
                $stmt->bind_param("i", $pID);
                $stmt->execute();
                $stmt->bind_result($stock);
                $stmt->fetch();
                $stmt->close();

                $newQuantity = $stock - $quantity;

                
                $stmt = $conn->prepare("UPDATE `products` SET `Stock` = ? WHERE `products`.`Product_ID` = ?");
                $stmt->bind_param("ii", $newQuantity, $pID);
                $stmt->execute();
            }
        }
        unset($_SESSION['cart']);
    }
    // Close the database connection
    $conn->close();
?>
<link rel="stylesheet" href="../style/paymentSuccess.css">
<div class="thank-you-container">
    <h4>Thank You For Ordering</h4>
    <p>Your items will be packed soon</p>
    <img src="../images/payment/payment_complete2.png" alt="thank you png">
    
    <!-- Countdown button and JavaScript -->
    <p id="countdown">Returning to homepage in 10 seconds...</p>
    <button id="returnBtn" onclick="redirectToHomepage()">Return to Homepage</button>
</div>

<script>
    // Countdown timer
    var countdown = 10;
    var countdownElement = document.getElementById('countdown');
    var countdownInterval = setInterval(function() {
        countdown--;
        countdownElement.textContent = 'Returning to homepage in ' + countdown + ' seconds...';
        if (countdown <= 0) {
            clearInterval(countdownInterval);
            redirectToHomepage();
        }
    }, 1000);

    // Function to redirect to homepage
    function redirectToHomepage() {
        window.location.href = '../home/index.php'; // Change 'index.php' to your actual homepage file
    }
</script>