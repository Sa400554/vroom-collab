<?php
// Start session
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
    $randomNumber = mt_rand(1000, 9999);

    $CarId ="#Vc" . $randomNumber . "Id";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $CarName = $_POST['CarName'];
    $CarSeats = $_POST['CarSeats'];
    $CarCapacity = $_POST['CarCapacity'];
    $CarTransmission = $_POST['CarTransmission'];
    $StartLocation = $_POST['StartLocation'];
    $EndLocation = $_POST['EndLocation'];
    $FromToPrice = $_POST['FromToPrice'];
    $PricePerKm = $_POST['PricePerKm'];
    $CarType = $_POST['CarType'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'vroomcarrental');
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    if ($CarName == NULL){
        $_SESSION['error_message'] = 'The Fields can not be empty';
        // Send JSON response
        echo json_encode(['error' => 'The Fields can not be empty']);
        exit();
    } else {
        $stmt = $conn->prepare("INSERT INTO cardatabase (Name, Seats, Capacity, Transmission, StartLocation, EndLocation, FromToPrice, PricePerKm, Type,CarId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
        if (!$stmt) {
            // Send JSON response
            echo json_encode(['error' => 'Prepare failed: (' . $conn->errno . ') ' . $conn->error]);
            exit();
        }
        $stmt->bind_param("sissssiiss", $CarName, $CarSeats, $CarCapacity, $CarTransmission, $StartLocation, $EndLocation, $FromToPrice, $PricePerKm, $CarType,$CarId);
        
        if ($stmt->execute()) {
            // Set success message in session
            $_SESSION['success_message'] = 'Data inserted successfully';
            // Send JSON response
            echo json_encode(['success' => 'Data inserted successfully']);
            
        } else {
            // Send JSON response
            echo json_encode(['error' => 'Error: ' . $stmt->error]);
        }
        $stmt->close();
    }
    // Close database connection
    $conn->close();
    header("Location: index.php");
    exit();
}
?>
