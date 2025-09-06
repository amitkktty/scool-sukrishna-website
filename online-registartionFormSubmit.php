<?php
include "admin/dbconnect.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and validate inputs
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $location = mysqli_real_escape_string($conn, trim($_POST['location']));
    $course = mysqli_real_escape_string($conn, trim($_POST['course']));
    $board = mysqli_real_escape_string($conn, trim($_POST['board']));
    $message = mysqli_real_escape_string($conn, trim($_POST['message']));

    $date = date('Y-m-d H:i:s');

    // Check if phone number already exists
    $checkQuery = "SELECT * FROM online_registration WHERE phone = ?";
    $stmtCheck = $conn->prepare($checkQuery);
    $stmtCheck->bind_param("s", $phone);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();

    if ($resultCheck->num_rows > 0) {
        // Phone number already exists, send error response
        echo json_encode([
            'status' => 'error',
            'message' => 'This phone number is already registered. Please use a different phone number.'
        ]);
    } else {
        // Insert new registration
        $stmt = $conn->prepare("INSERT INTO online_registration (name, phone, email, location, course, board, message, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $phone, $email, $location, $course, $board, $message, $date);

        if ($stmt->execute()) {
            // Successful submission, send success response
            echo json_encode([
                'status' => 'success',
                'message' => 'Form submitted successfully!'
            ]);
        } else {
            // Error while inserting, send error response
            echo json_encode([
                'status' => 'error',
                'message' => 'Error: ' . $stmt->error
            ]);
        }

        // Close the statement
        $stmt->close();
    }
} else {
    // If it's not a POST request, send an error response
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method.'
    ]);
}
?>