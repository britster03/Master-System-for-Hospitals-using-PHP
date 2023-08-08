<!DOCTYPE html>
<html>
<head>
    <title>Admin Signup</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add custom CSS -->
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
    <div class="container mt-5 text-center">
        <h1>Hospital Management System</h1>
    </div>
        <h2 class="font-monsterrat">Admin Signup</h2>
        <form action="admin_signup_process.php" method="post">
            <div class="form-group">
                <label for="admin_username">Username</label>
                <input type="text" name="admin_username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="admin_password">Password</label>
                <input type="password" name="admin_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Signup</button>
            <div class="container mt-5 text-center">
        <h2>Already Registered As Admin</h2>
        <p>If you are already registered, please login below:</p>
        <a href="admin_login.php" class="btn btn-success">Login Here</a>
    </div>
        </form>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
