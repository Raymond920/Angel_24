<?php 
    session_start();
    
    $conn = mysqli_connect("localhost","root","","angel_24");

    if (!$conn) {
        die("Connection Failed: ". mysqli_connect_error());
    }

    // Get the posted form data
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Prepare and bind
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
            echo "Login successful! Welcome, " . $db_username . ".";
            // Redirect to a secure page
            header("Location:../home");
            exit;
        } else {
            // Incorrect password
            $_SESSION['error'] = "Incorrect password. Please try again.";
            header("Location:../");
            exit;
        }
    } else {
        // Username not found
        $_SESSION['error'] = "Invalid username. Please try again.";
        header("Location:../");
        exit;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
?>
