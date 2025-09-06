<?php
include "admin/dbconnect.php";
session_start();
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $branch = $conn->real_escape_string($_POST['branch']);
    $form_type = isset($_POST['form_type']) ? $conn->real_escape_string($_POST['form_type']) : 'Fee Structure Download Data';

    $date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO contact (name, phone, branch, form_type)
            VALUES ('$name', '$phone', '$branch', '$form_type')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Database error: ' . $conn->error
        ]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>