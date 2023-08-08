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


$username = $_POST['username'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];


$hashed_password = md5($password);


$sql = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password' AND user_type='$user_type'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {

    $_SESSION['username'] = $username;
    $_SESSION['user_type'] = $user_type;
    if ($user_type === "doctor") {
        header("Location: doctor_dashboard.php");
    } else if ($user_type === "patient") {
        header("Location: patient_dashboard.php");
    }
} else {

    $_SESSION['login_error'] = "Invalid credentials. Please try again.";
    header("Location: login.php");
}

$conn->close();
?>
