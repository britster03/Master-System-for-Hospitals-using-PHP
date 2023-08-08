<?php
session_start();

// Connect to the database (Replace with your database credentials)
$host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "hsptl";

$conn = new mysqli($host, $db_user, $db_password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user inputs
$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];


// Hash the password to match the hashed password stored in the database
$hashed_password = md5($admin_password);

// Check user credentials in the database
$sql = "SELECT * FROM admin_info WHERE admin_username='$admin_username' AND admin_password='$hashed_password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Login successful, set session variables and redirect to a dashboard page based on user type
    $_SESSION['admin_username'] = $admin_username;
    header("Location: admin_dashboard.php");
} else {
    // Login failed, redirect back to login page with an error message
    $_SESSION['login_error'] = "Invalid credentials. Please try again.";
    header("Location: admin_login.php");
}

$conn->close();
?>

























































