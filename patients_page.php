<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Patients Page</title>
</head>
<body>

<div class="container mt-4">
    <h2>Patients</h2>
    <div class="row">
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

        // Fetch patient information from the database
        $query = "SELECT * FROM patient_info";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-md-4 mb-3">';
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $row['patient_name'] . '</h5>';
            echo '<p class="card-text">Medical History: ' . $row['medical_history'] . '</p>';
            // Display other patient information as needed
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
