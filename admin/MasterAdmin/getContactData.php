<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'dbconnect.php';

define('AUTH_KEY', 'pq_oiykujhyktreey');
define('API_URL', 'https://sukrishna.progressix.co.in/api/v1/website/enquiry-form/submit');
define('API_URL', 'https://sukrishnacommerce.com/admin/MasterAdmin/getContactData.php?authKey=pq_oiykujhyktreey');
define('API_USERNAME', 'sukrishna');
define('API_PASSWORD', '2ExNqMGAzxRMbRE');

// Function to check if the key is valid
function isValidKey($param) {
    return $param === AUTH_KEY;
}

// Check authentication key
if (!isset($_GET['authKey']) || !isValidKey($_GET['authKey'])) {
    echo json_encode(['status' => 'error', 'message' => 'Authentication failed']);
    exit();
}

// Check for database connection errors
if ($conn->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit();
}

// Get the contact data from the database
$query = "SELECT * FROM contact ORDER BY id DESC LIMIT 10";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $contactData = $result->fetch_all(MYSQLI_ASSOC);

    // Loop through each contact record and send it to the other API
    $responses = [];
    foreach ($contactData as $contact) {
        // Prepare the data to send to the new API
        $data = [
            "name" => $contact['name'],
            "phone" => $contact['phone'],
            "email" => $contact['email'],
            "subject" => $contact['subject'],
            "city" => $contact['city'],
            "message" => $contact['message']
        ];

        // Send POST request and collect the response
        $responses[] = sendPostRequest($data);
    }

    echo json_encode(['status' => 'success', 'data' => $responses]);

} else {
    echo json_encode(['status' => 'error', 'message' => 'No data found']);
}

$conn->close();

// Function to send POST request
function sendPostRequest($data) {
    $url = API_URL;
    $username = API_USERNAME;
    $password = API_PASSWORD;

    // Prepare the headers
    $headers = [
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode("$username:$password")
    ];

    // Initialize cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    // Execute cURL request
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        return ['status' => 'error', 'message' => $error];
    }

    // Decode the API response
    return json_decode($response, true);
}
?>
