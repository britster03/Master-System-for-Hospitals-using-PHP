<!DOCTYPE html>
<html>
<head>
    <title>Doctor Dashboard</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
