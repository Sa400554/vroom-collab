<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect('localhost', 'root', '', 'vroomcarrental');

// Check database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch orders
$query = "SELECT * FROM orders";
$query_run = mysqli_query($conn, $query);

// Check for errors in the SQL query
if (!$query_run) {
    die("Query failed: " . mysqli_error($conn));
}

$result_array = [];

if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $row) {
        array_push($result_array, $row);
    }
    header('Content-type: application/json');
    echo json_encode($result_array);
} else {
    echo $return = "";
}

// Check for the update order request
if (isset($_POST['Confirmed'])) {
    $Order_id = $_POST['OrderId'];

    $query = "UPDATE orders SET Status = 'Confirmed' WHERE OrderID = '$Order_id'";

    // Check for errors in the update query
    if ($query_run = mysqli_query($conn, $query)) {
        echo $return = "Successfully Updated !";
    } else {
        echo $return = "Something Went Wrong: " . mysqli_error($conn);
    }
}
if (isset($_POST['Declined'])) {
    $Order_id = $_POST['OrderId'];

    $query = "UPDATE orders SET Status = 'Declined' WHERE OrderID = '$Order_id'";

    // Check for errors in the update query
    if ($query_run = mysqli_query($conn, $query)) {
        echo $return = "Successfully Updated !";
    } else {
        echo $return = "Something Went Wrong: " . mysqli_error($conn);
    }
}

if (isset($_POST['Null'])) {
    $Order_id = $_POST['OrderId'];

    $query = "UPDATE orders SET Status = NULL WHERE OrderID = '$Order_id'";

    // Check for errors in the update query
    if ($query_run = mysqli_query($conn, $query)) {
        echo $return = "Successfully Updated !";
    } else {
        echo $return = "Something Went Wrong: " . mysqli_error($conn);
    }
}



?>