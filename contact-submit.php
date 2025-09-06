<?php
include "admin/dbconnect.php";

session_start();

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $city = $conn->real_escape_string($_POST['location']);
    $message = $conn->real_escape_string($_POST['message']);

    $date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO contact (name, phone, email, subject, city, message, date)
            VALUES ('$name', '$phone', '$email', '$subject', '$city', '$message', '$date')";

    if ($conn->query($sql) === TRUE) {

        echo json_encode([
            'status' => 'success',
            'message' => 'Thank you for contacting us! Your message has been submitted.'
        ]);
    } else {

        echo json_encode([
            'status' => 'error',
            'message' => 'There was an error while submitting your message. Please try again later.'
        ]);
    }
}
?>