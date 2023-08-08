<!-- appointment_status.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Appointment Status</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        /* Apply Montserrat font to the title */
        h1 {
            font-family: 'Montserrat', sans-serif;
        }
        div {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
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

        // Fetch the appointment details for the patient from the appointment_info table
        $sql_appointment = "SELECT * FROM appointment_info WHERE patient_name='$patient_name' AND appointment_date >= CURDATE() ORDER BY appointment_date ASC";
        $result_appointment = $conn->query($sql_appointment);

        if ($result_appointment->num_rows > 0) {
            echo '<h2>Upcoming Appointment Details</h2>';
            echo '<table class="table table-bordered">';
            echo '<tr><th>Doctor Name</th><th>Appointment Date</th></tr>';
            while ($row_appointment = $result_appointment->fetch_assoc()) {
                $doctor_name = $row_appointment['doctor_name'];
                // Fetch doctor details from doctor_info table based on doctor_id
                $sql_doctor = "SELECT * FROM appointment_info WHERE doctor_name='$doctor_name'";
                $result_doctor = $conn->query($sql_doctor);
                $row_doctor = $result_doctor->fetch_assoc();

                // Display appointment details in a table
                echo '<tr>';
                echo '<td>' . $row_doctor['doctor_name'] . '</td>';
                echo '<td>' . $row_appointment['appointment_date'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<h3>No upcoming appointments</h3>';
        }

        $conn->close();
        ?>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<!-- End of appointment_status.php -->

