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
$username = $_POST['username'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];

// Hash the password before storing it in the database
$hashed_password = md5($password);

// Check if the user already exists in the database
$sql_check_user = "SELECT * FROM users WHERE username='$username' AND user_type='$user_type'";
$result_check_user = $conn->query($sql_check_user);

if ($result_check_user->num_rows > 0) {
    // User already exists, redirect back to signup page with an error message
    $_SESSION['signup_error'] = "User already exists. Please choose a different username.";
    header("Location: signup.php");
} else {
    // Insert user information into the users table
// Insert user information into the database
$sql = "INSERT INTO users (username, password, user_type) VALUES ('$username', '$hashed_password', '$user_type')";
if ($conn->query($sql) === TRUE) {
    echo "Signup successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>
