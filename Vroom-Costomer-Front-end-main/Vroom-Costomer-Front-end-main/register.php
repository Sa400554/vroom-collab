<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Include the connection file
    require('connection.php');

    // Check if the register-btn is set in the POST request
    if (isset($_POST['register-btn'])) {
        // Get form data
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];

        // Prepare SQL statement
        $query = "INSERT INTO `register`(`FirstName`, `Surname`, `Email`, `Password`) VALUES (?, ?, ?, ?)";

        // Prepare and bind parameters
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $firstname, $surname, $email, $password);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the login page with a success message
            echo "<script>alert('Record inserted successfully.'); window.location.href = 'login.html';</script>";
            exit; // Terminate script execution
        } else {
            // Redirect to the registration page with an error message
            echo "<script>alert('Error: " . $stmt->error . "'); window.location.href = 'register.html';</script>";
            exit; // Terminate script execution
        }

        // Close statement
        $stmt->close();

        // Close connection
        $conn->close();
    }
} else {
    // Redirect to the registration page with an alert message
    echo "<script>alert('Invalid request method.'); window.location.href = 'register.html';</script>";
    exit; // Terminate script execution
}
?>
