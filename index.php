<!DOCTYPE html>
<html>
<head>
    <title>Hospital Management System</title>

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
        <h1 class="text-center font-monsterrat">Hospital Management System</h1>
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title">Patient/Doctor Signup</h5>
                        <a href="signup.php" class="btn btn-light">Signup</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Patient/Doctor Login</h5>
                        <a href="login.php" class="btn btn-light">Login</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-dark">
                    <div class="card-body">
                        <h5 class="card-title">Admin Signup/Login</h5>
                        <a href="admin_signup.php" class="btn btn-light">Signup</a>
                        <a href="admin_login.php" class="btn btn-light">Login</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-4 mx-auto mt-4 text-center">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h5 class="card-title">Make Job Request</h5>
                        <button class="btn btn-light" onclick="toggleJobRequestForm()">Make Job Request</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



<div id="jobRequestForm" class="mt-4" style="display: none;">
    <div class="container">
        <h3>Job Request Form</h3>
        <form action="submit_job_request.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="qualification">Qualification</label>
                <input type="text" name="qualification" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="resume">Upload Resume</label>
                <input type="file" name="resume" class="form-control-file" required accept=".pdf">
            </div>
            <button type="submit" class="btn btn-success">Submit Job Request</button>
        </form>
    </div>


<script>
    function toggleJobRequestForm() {
        const formDiv = document.getElementById("jobRequestForm");
        formDiv.style.display = formDiv.style.display === "none" ? "block" : "none";
    }
</script>





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
