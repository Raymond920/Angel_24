<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
    
    $db_username = $_SESSION['username'];
    $db_password = $_SESSION['password'];
    $db_email = $_SESSION['email'];
    $db_phoneno = $_SESSION['phoneno'];

    // validate username
    if ($username !== "" && $username !== $db_username) {
        $stmt_check = $conn->prepare("SELECT COUNT(*) FROM user WHERE username = ?");
        $stmt_check->bind_param("s", $username);
        $stmt_check->execute();
        $stmt_check->bind_result($count);
        $stmt_check->fetch();
        $stmt_check->close();

        if ($count > 0) {
            $_SESSION['nameErr'] = true;
            $username = $db_username;
        } else {
            $_SESSION['nameErr'] = false;
            
        }
    } else {
        $username = $db_username;
        $_SESSION['nameErr'] = false;
    }

    //validate password
    if ($password!== ""){
        
    }else {
        $password = $db_password;
    }

    //validate email
    if ($email!== ""){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            
        }else {
            $email = $db_email;
        }
    }else {
        $email = $db_email;
    }

    //validate phone
    if ($phoneno!== ""){
        if (!preg_match("/^[0-9]{10,11}$/", $phoneno)) {
            $_SESSION['phoneErr'] = true;
            $phoneno = $db_phoneno;
        }else{
            $_SESSION['phoneErr'] = false;
            
        }
    }else {
        $phoneno = $db_phoneno;
        $_SESSION['phoneErr'] = false;
    }

    // Retrieve the current profile picture
    $stmt2 = $conn->prepare("SELECT image_data, image_type FROM profile_pic WHERE username = ?");
    $stmt2->bind_param("s", $db_username);
    $stmt2->execute();
    $stmt2->bind_result($currentImgData, $currentImgType);
    $stmt2->fetch();
    $stmt2->close();

    //validate uploaded file
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK && in_array($_FILES['image']['type'], ['image/jpeg', 'image/png', 'image/jpg', 'image/bmp', 'image/webp'])) {
        if (getimagesize($_FILES["image"]["tmp_name"])){
            $_SESSION['imgErr'] = false;
            $imgTmpPath = $_FILES['image']['tmp_name'];
            $imgData = file_get_contents($imgTmpPath);
            $imgType = $_FILES['image']['type'];
        } else {
            $_SESSION['imgErr'] = true;
            $imgData = $currentImgData; // Keep the current image
            $imgType = $currentImgType; // Keep the current image type
        }
    } else if ($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE){
        $_SESSION['imgErr'] = false;
        $imgData = $currentImgData; // No new image uploaded, use current image
        $imgType = $currentImgType; // No new image type
    } else {
        $_SESSION['imgErr'] = true;
        $imgData = $currentImgData; // Keep the current image if upload fails
        $imgType = $currentImgType;
    }

    // Redirect to the edit profile page after successfully edit profile
    if ($_SESSION['nameErr'] == false && $_SESSION['phoneErr'] == false && $_SESSION['imgErr'] == false){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        $_SESSION['phoneno'] = $phoneno;
        // Prepare an SQL statement and bind
        $stmt = $conn->prepare("UPDATE user SET username = ?, password = ?, email = ?, phone_no = ? WHERE username = ?");
        $stmt->bind_param("sssss", $username, $password, $email, $phoneno, $db_username);

        // Update profile picture
        $stmt1 = $conn->prepare("UPDATE profile_pic SET username=?, image_data = ?, image_type = ? WHERE username = ?");
        $stmt1->bind_param("ssss", $username, $imgData, $imgType, $db_username);

        //Execute the statement
        if ($stmt->execute() && $stmt1->execute()){
            header("location:index.php");
            exit();
        }
        else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $stmt1->close();
        $conn->close();
    }else{
        // Handle errors
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Edit profile</title>
        <link rel="stylesheet" href="../style/mystyle1.css">
        <link rel="stylesheet" href="../style/edit_profile.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php include("../includes/header.php"); ?>
        <?php include("../includes/navigation.php"); ?>
        <div class="edit-profile-page">
            <div class="present-profile">
                <img src="../includes/profile_pic.php" alt="Image from Database"><br>
                <?php
                $username = $_SESSION['username'];
                $password = $_SESSION['password'];
                $email = $_SESSION['email'];
                $phoneno = $_SESSION['phoneno'];
                echo "Username: ". $username. "<br>";
                echo "Password: ". $password. "<br>";
                echo "Email: ". $email. "<br>";
                echo "Phone number: ". $phoneno. "<br>";
                ?>
            </div>

            <div class="edit-form">
            <form action="" enctype="multipart/form-data" class="profile_edit_form" method="POST">
            <label for="name">New Username:</label><br>
            <input type="text" id="name" class="name" name="name" placeholder="<?php echo htmlspecialchars("unchanged if empty");?>">
            <span class="error">
                <?php if($_SESSION['nameErr'] == true){
                    echo '<br>Username already exists'; 
                }?>
            </span><br><br>

            <label for="password">New Password:</label><br>
            <input type="text" id="password" name="password" placeholder="<?php echo htmlspecialchars("password here");?>"><br><br>

            <label for="email">New Email:</label><br>
            <input type="email" id="email" name="email" placeholder="<?php echo htmlspecialchars($email);?>"><br><br>

            <label for="phoneno">New Phone number:</label><br>
            <input type="tel" id="phoneno" name="phoneno" placeholder="<?php echo htmlspecialchars($phoneno);?>">
            <span class="error">
                <?php if($_SESSION['phoneErr'] == true){
                    echo '<br>Invalid phone number'; 
                }?></span><br><br>

            <label for="image">New profile picture:</label><br>
            <input type="file" name="image" id="image" accept="image/*">
            <span class="error">
                <?php if($_SESSION['imgErr'] == true){
                    echo '<br>Invalid file uploaded'; 
                }?>
            <br><br><br>

            <button type="submit" class="editbtn">Edit profile</button>
        </form>
        </div>
    </div>
    </body>
</html>
