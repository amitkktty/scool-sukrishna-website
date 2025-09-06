<?php
include "admin/dbconnect.php";

if (isset($_POST['send_btn'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $course = $_POST['course'];
    $testDate = $_POST['testDate'];
    $city = $_POST['city'];
    $msg = $_POST['msg'];
    $dob = $_POST['dob'];
    $coachingName = $_POST['coachingName'];
    $currentClass = $_POST['currentClass'];
    $board = $_POST['board'];
    $testMode = $_POST['testMode'];
    $guardianName = $_POST['guardianName'];
    $address = $_POST['address'];

    $enquiry_at = date("Y-m-d H:i:s");

    $sql = "INSERT INTO scholarship_data (name, email, mobile, course, testDate, city, msg, dob, coachingName, currentClass, board, testMode, guardianName, address, enquiry_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssssssssssssss", $name, $email, $mobile, $course, $testDate, $city, $msg, $dob, $coachingName, $currentClass, $board, $testMode, $guardianName, $address, $enquiry_at);

    if ($stmt->execute()) {
        echo "
        <script>
            alert('Data submitted successfully!');
            window.location.href = 'super-ca-commerce-scholarship-test.php'; // Redirect to your form page
        </script>
        ";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>