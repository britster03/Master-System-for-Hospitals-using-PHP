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

    $doctor_name = $_POST['doctor_name'];
    $specialization = $_POST['specialization'];

 
    $sql = "INSERT INTO doctor_info (doctor_name, specialization) VALUES ('$doctor_name', '$specialization')";
    if ($conn->query($sql) === TRUE) {
     
        header("Location: doctor_dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
