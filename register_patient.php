<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "hsptl";

    $conn = new mysqli($host, $db_user, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $patient_name = $_POST['patient_name'];
    $medical_history = $_POST['medical_history'];


    $sql = "INSERT INTO patient_info (patient_name, medical_history) VALUES ('$patient_name', '$medical_history')";
    if ($conn->query($sql) === TRUE) {
     
        header("Location: patient_dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
