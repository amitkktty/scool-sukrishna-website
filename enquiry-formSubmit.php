<?php
include "admin/dbconnect.php";

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $formType = $_POST['formType'];
    $fname = isset($_POST['name']) ? $_POST['name'] : '';
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $location = $_POST['location'];
    $message = $_POST['message'];

    $checkPhoneQuery = "SELECT * FROM `enuiry` WHERE `number` = '$phone'";
    $result = $conn->query($checkPhoneQuery);

    if ($result->num_rows > 0) {

        $response['status'] = 'error';
        $response['message'] = 'This phone number is already registered. Please use a different phone number.';
    } else {

        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO `enuiry` (`form_type`, `fname`, `number`, `subject`, `city`, `message`, `date`) 
                VALUES ('$formType', '$fname', '$phone', '$course', '$location', '$message', '$date')";

        if ($conn->query($sql) === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Your message has been submitted successfully!';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'There was an error while submitting your inquiry. Please try again later.';
        }
    }

    echo json_encode($response);
}
?>