<!-- book_appointment.php -->
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

$patient_name = $_SESSION['username'];
$appointment_date = $_POST['appointment_date'];
$doctor_name = $_POST['doctor_name'];

// Insert appointment details into the appointment_info table
$sql_insert_appointment = "INSERT INTO appointment_info (patient_name, doctor_name, appointment_date) VALUES ('$patient_name', '$doctor_name', '$appointment_date')";
if ($conn->query($sql_insert_appointment) === TRUE) {
    // Appointment booked successfully, redirect to appointment status page
    header("Location: appointment_status.php");
} else {
    // Error during appointment booking, redirect back to patient_dashboard with an error message
    $_SESSION['booking_error'] = "Error: " . $sql_insert_appointment . "<br>" . $conn->error;
    header("Location: patient_dashboard.php");
}

$conn->close();
?>
<!-- End of book_appointment.php -->
