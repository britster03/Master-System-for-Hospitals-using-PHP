<?php
require 'database.php';

// ... Other code ...

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $requestId = $_POST['request_id'];
    $status = $_POST['status'];

    $request = getRequestById($requestId);

    if ($request) {
        if ($status == 'accept') {
            $subject = 'Job Request Accepted';
            $message = 'Your job request has been accepted.';
        } elseif ($status == 'reject') {
            $subject = 'Job Request Rejected';
            $message = 'Your job request has been rejected.';
        }

        sendEmail(getEmailsFromJobRequests(), $subject, $message);
        deleteRequest($requestId);
    }
}

$jobRequests = getJobRequests();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Requests</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Job Requests</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Qualification</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jobRequests as $request): ?>
                    <tr>
                        <td><?php echo $request['name']; ?></td>
                        <td><?php echo $request['email']; ?></td>
                        <td><?php echo $request['address']; ?></td>
                        <td><?php echo $request['qualification']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="request_id" value="<?php echo $request['id']; ?>">
                                <button type="submit" name="status" value="accept" class="btn btn-success">Accept</button>
                                <button type="submit" name="status" value="reject" class="btn btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
