<?php
session_start();


$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "hsptl";

$conn = new mysqli($host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];



$hashed_password = md5($admin_password);


$sql = "SELECT * FROM admin_info WHERE admin_username='$admin_username' AND admin_password='$hashed_password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  
    $_SESSION['admin_username'] = $admin_username;
    header("Location: admin_dashboard.php");
} else {

    $_SESSION['login_error'] = "Invalid credentials. Please try again.";
    header("Location: admin_login.php");
}

$conn->close();
?>

























































