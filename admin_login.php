<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
    
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
        <h2 class="font-monsterrat">Admin Login</h2>
        <form action="admin_login_process.php" method="post">
            <div class="form-group">
                <label for="admin_username">Username</label>
                <input type="text" name="admin_username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="admin_password">Password</label>
                <input type="password" name="admin_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Login</button>
            <div class="container mt-5 text-center">
        <h2>Not Registered Yet?</h2>
        <p>Register now, please click below:</p>
        <a href="admin_signup.php" class="btn btn-success">Login Here</a>
    </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
