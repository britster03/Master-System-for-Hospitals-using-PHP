<?php

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


$sql_check_user = "SELECT * FROM users WHERE username='$username' AND user_type='$user_type'";
$result_check_user = $conn->query($sql_check_user);

if ($result_check_user->num_rows > 0) {
 
    $_SESSION['signup_error'] = "User already exists. Please choose a different username.";
    header("Location: signup.php");
} else {

$sql = "INSERT INTO users (username, password, user_type) VALUES ('$username', '$hashed_password', '$user_type')";
if ($conn->query($sql) === TRUE) {
    echo "Signup successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>
