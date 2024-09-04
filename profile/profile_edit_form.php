<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "angel_24";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the username and password from the form
    $username = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    session_start();
    $db_username = $_SESSION['username'];
    $db_password = $_SESSION['password'];
    $db_email = $_SESSION['email'];
    $db_phoneno = $_SESSION['phoneno'];

    if ($username!== ""){
        $_SESSION['username'] = $username;
    }else {
        $username = $db_username;
    }

    if ($password!== ""){
        $_SESSION['password'] = $password;
    }else {
        $password = $db_password;
    }

    if ($email!== ""){
        $_SESSION['email'] = $email;
    }else {
        $email = $db_email;
    }

    if ($phoneno!== ""){
        $_SESSION['phoneno'] = $phoneno;
    }else {
        $phoneno = $db_phoneno;
    }

    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
        $imgTmpPath = $_FILES['image']['tmp_name'];
        $imgData = file_get_contents($imgTmpPath);
        $imgType = $_FILES['image']['type'];
    }else {
        $imgData = file_get_contents("../images/profile/profile-pic.png");
        $imgType = mime_content_type("../images/profile/profile-pic.png");
    }

    // Prepare an SQL statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE user SET username = ?, password = ?, email = ?, phone_no = ? WHERE username = ?");

    // Bind parameters to the SQL query
    $stmt->bind_param("sssss", $username, $password, $email, $phoneno, $db_username);

    // Upload profile picture
    $stmt1 = $conn->prepare("UPDATE profile_pic SET username=?, image_data = ?, image_type = ? WHERE username = ?");
    $stmt1->bind_param("ssss", $username, $imgData, $imgType, $db_username);

    // Redirect to the edit profile page after successfully edit profile
    if ($stmt->execute() && $stmt1->execute()){
        header('Location: index.php');
    }else{
        echo 'Error updating user profile'. $stmt->error;
    }

    $stmt->close();
    $stmt1->close();
    $conn->close();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>