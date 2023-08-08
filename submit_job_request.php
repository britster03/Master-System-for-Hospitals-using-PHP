<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate the input data
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $qualification = $_POST['qualification'] ?? '';

    // File upload handling
    $uploadDirectory = "pdf/";
    $resumePath = $uploadDirectory . basename($_FILES["resume"]["name"]);
    move_uploaded_file($_FILES["resume"]["tmp_name"], $resumePath);

    // Add your database credentials here
    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "hsptl";

    // Create a connection to the database
    $conn = new mysqli($host, $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert job request info into jobrequest_info table
    $sql_insert = "INSERT INTO jobrequest_info (name, email, address, qualification, resume_path) VALUES ('$name', '$email', '$address', '$qualification', '$resumePath')";
    if ($conn->query($sql_insert) === TRUE) {
        // Job request submitted successfully
        header("Location: index.php"); // Redirect back to the dashboard
    } else {
        // Error occurred during job request submission
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }

    

    $conn->close();
} else {
    // Redirect back to index.php if accessed directly
    header("Location: index.php");
    exit();
}
?>
