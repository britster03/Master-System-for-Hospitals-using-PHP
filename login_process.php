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
$username = $_POST['username'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];

// Hash the password to match the hashed password stored in the database
$hashed_password = md5($password);

// Check user credentials in the database
$sql = "SELECT * FROM users WHERE username='$username' AND password='$hashed_password' AND user_type='$user_type'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Login successful, set session variables and redirect to a dashboard page based on user type
    $_SESSION['username'] = $username;
    $_SESSION['user_type'] = $user_type;
    if ($user_type === "doctor") {
        header("Location: doctor_dashboard.php");
    } else if ($user_type === "patient") {
        header("Location: patient_dashboard.php");
    }
} else {
    // Login failed, redirect back to login page with an error message
    $_SESSION['login_error'] = "Invalid credentials. Please try again.";
    header("Location: login.php");
}

$conn->close();
?>
