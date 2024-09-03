<link rel="stylesheet" href="../style/mystyle2.css">


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
    } else {
        $name = test_input($_POST['username']);

        // Check if username already exists
        $stmt = $conn->prepare("SELECT username FROM user WHERE username = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $nameErr = 'Username already taken';
        }
        $stmt->close();
    }

    if (empty($_POST['password'])) {
        $passwordErr = 'Password is required';
    } else {
        $password = test_input($_POST['password']);
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
            $phoneErr = "Invalid phone number format. No '-'";
        }
    }
    

    // Check if there are no errors
   if (empty($nameErr) && empty($passwordErr) && empty($emailErr) && empty($phoneErr)) {
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO user (username, password, email, phone_no) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $password, $email, $phone);

    $stmt1 = $conn->prepare("INSERT INTO profile_pic (username) VALUES (?)");
    $stmt1->bind_param("s", $name);

    // Execute the statement
    if ($stmt->execute() && $stmt1->execute()) {
        // Redirect to home page
        header("Location:../");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
    $stmt1->close();
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

<div class="registerForm">
    <h3>Register</h3>
    <form class="formContent" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="registerForm">
        <div class="container">
            <div id="usernameInput">
                <label for="username">Username:</label>
                <span class="error"><?php echo $nameErr; ?></span>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($name); ?>">
            </div>
            <div id="passwordInput">
                <label for="password">Password:</label>
                <span class="error"><?php echo $passwordErr; ?></span>
                <input type="text" name="password" id="password" value="<?php echo htmlspecialchars($password); ?>">
            </div>
            <div id="emailInput">
                <label for="email">Email:</label>
                <span class="error"><?php echo $emailErr; ?></span>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
            </div>
            <div id="phoneInput">
                <label for="phone">Phone:</label>
                <span class="error"><?php echo $phoneErr; ?></span>
                <input type="tel" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>">
            </div>
            <button type="submit" name="submit" id="submit">Submit</button>
        </div>
    </form>
</div>