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
    $UserID = $_POST['User_id'];
    $CarId = $_POST['car_id'];
    $CarName = $_POST['carName'];
    $PaymentType = $_POST['paymentType'];
    $CostumerEmail = $_POST['cMail'];
    $CostumerNumber = $_POST['cNum'];
    $StartLocation = $_POST['startLocation'];
    $Destination = $_POST['destination'];
    $EstimatedPrice = $_POST['estimatedPrice'];

    $query = "INSERT INTO orders (OrderID, Number, Destination, StartLocation, Car, Email, PaymentMethod, CarID, estimatedPrice,UserId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, 'ssssssssss', $OrderID, $CostumerNumber, $Destination, $StartLocation, $CarName, $CostumerEmail, $PaymentType, $CarId, $EstimatedPrice,$UserID);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "Data Uploaded!";
    } else {
        echo "Something Went Wrong: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}

if (isset($_POST['checking_checkOrder'])) {

    $User_ID = $_POST['User_ID'];

    $result_array = [];

    $query = "SELECT * FROM `orders` WHERE UserID = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, 's', $User_ID);
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
if (isset($_POST['checking_Order'])) {

    $result_array = [];

    $query = "SELECT * FROM `orders`";
    $stmt = mysqli_prepare($conn, $query);
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

if (isset($_POST['checking_notification'])) {
    $notificationCount = 0;
    $User_ID = mysqli_real_escape_string($conn, $_POST['user_id']); // Sanitize input

    $query = "SELECT COUNT(*) AS count 
                FROM orders 
                WHERE (Status = 'Declined' OR Status = 'Confirmed') 
                AND UserId = '$User_ID'"; // Quote the user ID

    $result = mysqli_query($conn, $query);
    if (!$result) {
        // Query failed, handle the error
        echo "Error: " . mysqli_error($conn);
    } else {
        // Query succeeded, fetch the result
        $row = mysqli_fetch_assoc($result);
        $notificationCount += $row['count'];

        // Return the notification count
        echo $notificationCount;
    }
}


?>
