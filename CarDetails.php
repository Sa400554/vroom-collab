<?php

$conn = mysqli_connect('localhost', 'root', '', 'vroomcarrental');

if (isset($_POST['checking_edit'])) {
    $CarId = $_POST['CarID'];
    $result_array = [];

    $query = "SELECT * FROM cardatabase WHERE CarID=?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, 's', $CarId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    } else {
        echo "No Record Found.!";
    }

    mysqli_stmt_close($stmt);
}

if (isset($_POST['checking_update'])) {
    $OrderID = $_POST['orderId'];
    $CarId = $_POST['car_id'];
    $CarName = $_POST['carName'];
    $PaymentType = $_POST['paymentType'];
    $CostumerEmail = $_POST['cMail'];
    $CostumerNumber = $_POST['cNum'];
    $StartLocation = $_POST['startLocation'];
    $Destination = $_POST['destination'];
    $EstimatedPrice = $_POST['estimatedPrice'];

    $query = "INSERT INTO orders (OrderID, Number, Destination, StartLocation, Car, Email, PaymentMethod, CarID, estimatedPrice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, 'sssssssss', $OrderID, $CostumerNumber, $Destination, $StartLocation, $CarName, $CostumerEmail, $PaymentType, $CarId, $EstimatedPrice);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Data Uploaded!";
    } else {
        echo "Something Went Wrong: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

if (isset($_POST['checking_checkOrder'])) {

    $Order_ID = $_POST['Order_ID'];

    $result_array = [];

    $query = "SELECT * FROM `orders` WHERE OrderID = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, 's', $Order_ID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    } else {
        echo "No Record Found.!";
    }

    mysqli_stmt_close($stmt);
}
if (isset($_POST['checking_Location'])) {

    $location = $_POST['Location'];

    $result_array = [];

    $query = "SELECT * FROM cardatabase WHERE StartLocation=?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, 's', $location);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($result_array, $row);
        }
        header('Content-type: application/json');
        echo json_encode($result_array);
    } else {
        echo "No Record Found.!";
    }

    mysqli_stmt_close($stmt);
}

?>
