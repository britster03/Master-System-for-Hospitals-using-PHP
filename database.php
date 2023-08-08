<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';


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

function getRequestById($requestId) {
    $conn = connectToDatabase();
    $query = "SELECT * FROM jobrequest_info WHERE id = $requestId";
    $result = mysqli_query($conn, $query);
    $request = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $request;
}

function getJobRequests() {
    $conn = connectToDatabase();
    $query = "SELECT * FROM jobrequest_info";
    $result = mysqli_query($conn, $query);
    $requests = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($conn);
    return $requests;
}

function deleteRequest($requestId) {
    $conn = connectToDatabase();
    $query = "DELETE FROM jobrequest_info WHERE id = $requestId";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
}


function getEmailsFromJobRequests() {
    $conn = connectToDatabase();
    $query = "SELECT email FROM jobrequest_info";
    $result = mysqli_query($conn, $query);
    
    $email = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $email[] = $row['email'];
    }
    
    mysqli_close($conn);
    return $email;
}

function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer;
    
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'ronitvirwani1@gmail.com'; 
    $mail->Password = 'azbhblplcwcgtnsr'; 
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('ronitvirwani1@gmail.com', 'Ronit');
    
    foreach ($to as $email) {
        $mail->addAddress($email);
    }

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

?>
