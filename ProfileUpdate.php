<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'vroomcarrental');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['Name'];
    $phone = $_POST['Phone'];
    $email = $_POST['Email'];

    // Update the user's information in the database
    $sql = "UPDATE users SET Name=?, Number=?, Email=? WHERE UserID=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $phone, $email, $_SESSION['user_id']);

    if (mysqli_stmt_execute($stmt)) {
        // Profile update successful
        $response = array("success" => true, "message" => "Profile updated successfully.");
    } else {
        // Error occurred while updating profile
        $response = array("success" => false, "message" => "Error updating profile: " . mysqli_error($conn));
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);

    // Return JSON response to the AJAX request
    echo json_encode($response);
}
?>