<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        /* Apply Montserrat font to the title */
        h1 {
            font-family: 'Montserrat', sans-serif;
        }
        div {
            font-family: 'Montserrat', sans-serif;
        }
        .card-body {
    justify-content: space-between;
    align-items: center;
}

.card-logo {
    max-width: 50px; /* Adjust the width as needed */
    height: auto;
    align-items: right;
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light flex-column">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="doctors_page.php">Doctors</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="patients_page.php">Patients</a>
        </li>
    </ul>
</nav>


        <div class="container mt-5">
    <div class="container mt-5 mb-4 text-center">
        <h1>Hospital Management System</h1>
    </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Admins</h5>
                        <p class="card-text"><?php echo getTotalAdmins(); ?> admin(s)</p>
                        <img src="images/admin.png" class="card-logo" alt="Admins">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Patients</h5>
                        <p class="card-text"><?php echo getTotalPatients(); ?> patient(s)</p>
                        <img src="images/patient.png" class="card-logo" alt="Patients">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Doctors</h5>
                        <p class="card-text"><?php echo getTotalDoctors(); ?> doctor(s)</p>
                        <img src="images/doctor.png" class="card-logo" alt="Doctor">
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4 mx-auto text-center">
                <div class="card bg-secondary text-white">
                    <div class="card-body">
                        <h5 class="card-title">View Job Requests</h5>
                        <a href="job_requests.php" class="btn btn-light">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4 ">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Job Requests</h5>
                        <p class="card-text"><?php echo countJobRequests(); ?> request(s)</p>
                        <img src="images/job_request.png" class="card-logo" alt="Admins">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Backend and Database-related code

function getTotalAdmins() {
    $conn = connectToDatabase();
    $query = "SELECT COUNT(*) FROM admin_info";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    mysqli_close($conn);
    return $row[0];
}

function countJobRequests() {
    $conn = connectToDatabase();
    $query = "SELECT COUNT(*) FROM jobrequest_info";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    mysqli_close($conn);
    return $row[0];
}

function getTotalPatients() {
    $conn = connectToDatabase();
    $query = "SELECT COUNT(*) FROM patient_info";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    mysqli_close($conn);
    return $row[0];
}

function getTotalDoctors() {
    $conn = connectToDatabase();
    $query = "SELECT COUNT(*) FROM doctor_info";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    mysqli_close($conn);
    return $row[0];
}

function connectToDatabase() {
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "hsptl";

    $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>
