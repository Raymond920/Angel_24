<?php

// Define variables and set to empty values
$nameErr = $passwordErr = $emailErr = $phoneErr = "";
$name = $password = $email = $phone = "";


// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "angel_24";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}


// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate name
    if (empty($_POST['username'])) {
        $nameErr = 'Name is required';
    }

    if (empty($_POST['password'])) {
        $passwordErr = 'Password is required';
    }

    // Validate email
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST['email']);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate phone number
    if (empty($_POST['phone'])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = test_input($_POST['phone']);
        //Check if phone number is valid
        if (!preg_match("/^\d{9,11}$/", $phone)) {
            $phoneErr = "Invalid phone number format. It should contain only digits and be up to 11 digits long.";
        }
    }
    

    // Check if there are any errors
    if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($messageErr) && empty($enquiryErr)) {
        // Send email
        $to = "youremail@example.com";
        $subject = "New contact form submission";
        $message = "Name: " . $name . "\nEmail" . $email . "\nPhone: " . $phone . "\nEnquiry: " . $enquiry . "\nMessage: " . $message;
        $headers = "From: " . $email;
        mail($to, $subject, $message, $headers);
        // Redirect to thank you page
        header("Location: thank-you.php");
        exit();
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<div class="registerForm"></div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="contactForm">
    <div id="usernameInput">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($name); ?>">
        <span class="error"><?php echo $nameErr; ?></span>
    </div>
    <div id="passwordInput">
        <label for="password">Password:</label>
        <input type="text" name="password" id="password" value="<?php echo htmlspecialchars($password); ?>">
        <span class="error"><?php echo $passwordErr; ?></span>
    </div>
    <div id="emailInput">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
        <span class="error"><?php echo $emailErr; ?></span>
    </div>
    <div id="phoneInput">
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>">
        <span class="error"><?php echo $phoneErr; ?></span>
    </div>
    <button type="submit" name="submit" id="submit">Submit</button>
</form>