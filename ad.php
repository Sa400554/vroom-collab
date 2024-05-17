<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Include the connection file
    $conn = mysqli_connect("localhost", "root", "", "vroomcarrental");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the register-btn is set in the POST request
    if (isset($_POST['register-btn'])) {
        // Get form data
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $accType = $_POST['accType'];

        // Prepare SQL statement
        $query = "INSERT INTO `users`(`Name`, `Number`, `Email`, `Password`, `AccType`) VALUES (?, ?, ?, ?, ?)";

        // Prepare and bind parameters
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssi", $name, $number, $email, $password, $accType);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the login page with a success message
            echo "<script>alert('Record inserted successfully.'); window.location.href = 'index.html';</script>";
            exit; // Terminate script execution
        } else {
            // Redirect to the registration page with an error message
            echo "<script>alert('Error: " . $stmt->error . "'); window.location.href = 'register.php';</script>";
            exit; // Terminate script execution
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
} else {
    // Redirect to the registration page with an alert message
    echo "<script>alert('Invalid request method.'); window.location.href = 'register.php';</script>";
    exit; // Terminate script execution
}
?>