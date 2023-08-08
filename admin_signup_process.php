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


$admin_username = $_POST['admin_username'];
$admin_password = $_POST['admin_password'];


$hashed_password = md5($admin_password);


$sql_check_user = "SELECT * FROM admin_info WHERE admin_username='$admin_username'";
$result_check_user = $conn->query($sql_check_user);

if ($result_check_user->num_rows > 0) {

    $_SESSION['signup_error'] = "User already exists. Please choose a different username.";
    header("Location: admin_signup.php");
} else {

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













































