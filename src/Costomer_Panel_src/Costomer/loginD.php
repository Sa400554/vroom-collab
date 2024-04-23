<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Establish database connection
    $conn = mysqli_connect('localhost', 'root', '', 'vroomcarrental');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the login-btn is set in the POST request
    if (isset($_POST['login-btn'])) {
        // Get form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare SQL statement
        $query = "SELECT * FROM `Users` WHERE `Email` = ? AND `Password` = ?";

        // Prepare and bind parameters
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $email, $password);

        // Execute the statement
        $stmt->execute();

        // Check if a matching record is found
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            // Redirect to the dashboard or home page
            // For now, let's just display a success message
            echo "<script>alert('Login successful!'); window.location.href = 'index.php';</script>";
        } else {
            // Display an alert message if login fails
            echo "<script>alert('Invalid email or password. Please try again.');window.location.href = 'login.php';</script>";
        }

        // Close statement
        $stmt->close();
        
        // Close connection
        $conn->close();
    }
} else {
    // Redirect to the login page with an alert message
    echo "<script>alert('Invalid request method.'); window.location.href = 'login.php';</script>";
}
?>

