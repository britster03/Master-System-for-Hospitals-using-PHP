<?php
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

// Hash the password before storing it in the database
$hashed_password = md5($admin_password);

// Check if the user already exists in the database
$sql_check_user = "SELECT * FROM admin_info WHERE admin_username='$admin_username'";
$result_check_user = $conn->query($sql_check_user);

if ($result_check_user->num_rows > 0) {
    // User already exists, redirect back to signup page with an error message
    $_SESSION['signup_error'] = "User already exists. Please choose a different username.";
    header("Location: admin_signup.php");
} else {
    // Insert admin info into admin_info table
    $sql = "INSERT INTO admin_info (admin_username, admin_password) VALUES ('$admin_username', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
        echo "Signup successful!";
        header("Location: admin_login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>













































