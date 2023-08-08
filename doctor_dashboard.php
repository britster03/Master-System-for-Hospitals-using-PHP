<!DOCTYPE html>
<html>
<head>
    <title>Doctor Dashboard</title>
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

        $doctor_name = $_SESSION['username'];

        // Check if the doctor details are already submitted
        $sql_check = "SELECT * FROM doctor_info WHERE doctor_name='$doctor_name'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows == 0) {
            // Doctor details form (displayed only for the first time)
            echo '
            <h2>Welcome, ' . $_SESSION['username'] . '!</h2>
            <h3>Register Doctor Details</h3>
            <form action="register_doctor.php" method="post">
                <div class="form-group">
                    <label for="doctor_name">Doctor Name:</label>
                    <input type="text" class="form-control" id="doctor_name" name="doctor_name" required>
                </div>

                <div class="form-group">
                <label for="specialization">Specialization:</label>
                <input type="text" class="form-control" id="specialization" name="specialization" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        ';
    } else {
        // Doctor details already submitted, display registered information
        $row = $result_check->fetch_assoc();
        echo '
        <h2>Welcome back, ' . $_SESSION['username'] . '!</h2>
        <h3>Your Registered Information</h3>
        <table class="table table-bordered">
            <tr>
                <th>Doctor Name</th>
                <th>Specialization</th>
            </tr>
            <tr>
                <td>' . $row['doctor_name'] . '</td>
                <td>' . $row['specialization'] . '</td>
            </tr>
        </table>
        ';

                // Fetch appointment requests for the doctor from appointment_info table
                $sql_appointment_requests = "SELECT * FROM appointment_info WHERE doctor_name='$doctor_name' AND appointment_date >= CURDATE() ORDER BY appointment_date ASC";
                $result_appointment_requests = $conn->query($sql_appointment_requests);
        
                if ($result_appointment_requests->num_rows > 0) {
                    echo '<h2>Appointment Requests</h2>';
                    echo '<table class="table table-bordered">';
                    echo '<tr><th>Patient Name</th><th>Appointment Date</th></tr>';
                    while ($row_appointment_request = $result_appointment_requests->fetch_assoc()) {
                        $patient_name = $row_appointment_request['patient_name'];
                        // Fetch patient details from patient_info table based on patient_id
                        $sql_patient = "SELECT * FROM patient_info WHERE patient_name='$patient_name'";
                        $result_patient = $conn->query($sql_patient);
                        $row_patient = $result_patient->fetch_assoc();
        
                        // Display appointment requests in a table
                        echo '<tr>';
                        echo '<td>' . $row_patient['patient_name'] . '</td>';
                        echo '<td>' . $row_appointment_request['appointment_date'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo '<h3>No appointment requests</h3>';
                }
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
