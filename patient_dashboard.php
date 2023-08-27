<!DOCTYPE html>
<html>
<head>
    <title>Patient Dashboard</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        
        h1 {
            font-family: 'Montserrat', sans-serif;
        }
        div {
            font-family: 'Montserrat', sans-serif;
        }
        body {
            background-image: url('images/background.jpg'); 
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: rgba(0, 0, 0, 0.55);  
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <?php
        session_start();

        $host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "hsptl";

        $conn = new mysqli($host, $db_user, $db_password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $patient_name = $_SESSION['username'];

        $sql_check = "SELECT * FROM patient_info WHERE patient_name='$patient_name'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows == 0) {
     
            echo '
            <h2>Welcome, ' . $_SESSION['username'] . '!</h2>
            <h3>Register Patient Details</h3>
            <form action="register_patient.php" method="post">
                <div class="form-group">
                    <label for="patient_name">Patient Name:</label>
                    <input type="text" class="form-control" id="patient_name" name="patient_name" required>
                </div>

                <div class="form-group">
                    <label for="medical_history">Medical History:</label>
                    <textarea class="form-control" id="medical_history" name="medical_history" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            ';
        } else {
    
            $row = $result_check->fetch_assoc();
            echo '
            <h2>Welcome back, ' . $_SESSION['username'] . '!</h2>
            <h3>Your Registered Information</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Patient Name</th>
                    <th>Medical History</th>
                </tr>
                <tr>
                    <td>' . $row['patient_name'] . '</td>
                    <td>' . $row['medical_history'] . '</td>
                </tr>
            </table>
            <hr>
            ';
            
          
            echo '
            <div class="mt-3 text-center">
                <a href="#appointmentForm" class="btn btn-primary" data-toggle="collapse">Book Appointment</a>
            </div>
            ';

            echo '            <div class="col-md-4 mt-4 mx-auto text-center">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h5 class="card-title">View Appointment Information</h5>
                    <a href="appointment_status.php" class="btn btn-light">View</a>
                </div>
            </div>
        </div>';

          
            echo '
            <div class="mt-3 collapse" id="appointmentForm">
                <h3>Book Appointment</h3>
                <form action="book_appointment.php" method="post">
                    <div class="form-group">
                        <label for="appointment_date">Appointment Date:</label>
                        <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
                    </div>

                    <div class="form-group">
                        <label for="doctor_id">Select Doctor:</label>
                        ';
   
            $sql_doctors = "SELECT * FROM doctor_info";
            $result_doctors = $conn->query($sql_doctors);
            echo '<select class="form-control" id="doctor_name" name="doctor_name" required>';
            while ($row_doctor = $result_doctors->fetch_assoc()) {
                echo '<option value="' . $row_doctor['doctor_name'] . '">' . $row_doctor['id'] . ' - ' . $row_doctor['specialization'] . '</option>';
            }
            echo '</select>';
            echo '
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            ';
        }

        

        $conn->close();
        ?>

    </div>

   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
