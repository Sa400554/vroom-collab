<?php
$conn = new mysqli('localhost', 'root', '', 'vroomcarrental');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['EDIT'])) {
    $Order_id = $_POST['OrderId'];
    $estimatedPrice = $_POST['estimatedPrice'];
    $Destination = $_POST['Destination'];
    $Number = $_POST['Number'];
    $Email = $_POST['Email'];

    $query = "UPDATE orders SET Destination = '$Destination', Number = '$Number', Email = '$Email', estimatedPrice = '$estimatedPrice' WHERE OrderID = '$Order_id';";

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo $return = "1";
    } else {
        echo $return = "Something Went Wrong: " . mysqli_error($conn); // Show MySQL error message
    }
}
if (isset($_GET['editOrder'])) {
    $OrderId = $_GET['OrderId'];

    $query = "SELECT * FROM orders WHERE OrderID='$OrderId'";
    
    $query_run = mysqli_query($conn, $query);

    if ($query_run && mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_assoc($query_run);
        header('Content-type: application/json');
        echo json_encode($row);
    } else {
        echo "No Record Found!";
    }
}
?>