<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "angel_24";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$name = $_SESSION['username'];

$sql = "SELECT image_data, image_type FROM profile_pic WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $name);
$stmt->execute();

$stmt->bind_result($imageData, $imageType);
$stmt->fetch();

if($imageData === NULL){
    $imageData = file_get_contents("../images/profile/profile-pic.png");
    $imageType = mime_content_type("../images/profile/profile-pic.png");
}

if($imageData){
    header("Content-type: " . $imageType);
    echo $imageData;
}else {
    echo "No image found with the username.";
}

$stmt->close();
$conn->close();
?>
