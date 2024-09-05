<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $conn = mysqli_connect("localhost","root","","angel_24");

    if (!$conn) {
        die("Connection Failed: ". mysqli_connect_error());
    }

    if (!isset($_SESSION['username']) && isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        // Auto-login using cookies
        $user = $_COOKIE['username'];
        $pass = $_COOKIE['password'];
        $stmt = $conn->prepare("SELECT username, password, email, phone_no FROM user WHERE username = ?");
        $stmt->bind_param("s", $user);

        // Execute the statement
        $stmt->execute();

        // Bind result variables
        $stmt->bind_result($db_username, $db_password, $db_email, $db_phone_no);

        // Fetch the result
        if ($stmt->fetch()) {
            // Verify the password
            if ($pass === $db_password) {
                // Password is correct, start the session
                $_SESSION['username'] = $db_username;
                $_SESSION['password'] = $db_password;
                $_SESSION['email'] = $db_email;
                $_SESSION['phoneno'] = $db_phone_no;
                
                // Redirect to a secure page
                header("Location: ../Angel_24/home");
                $stmt->close();
                $conn->close();
                exit;
            }
        }
    }
?>