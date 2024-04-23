<?php
$conn = new mysqli('localhost', 'root', '', 'vroomcarrental');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>