<script>
  document.addEventListener('DOMContentLoaded', function() {
    var toastElList = [].slice.call(document.querySelectorAll('.toast'));
    var toastList = toastElList.map(function(toastEl) {
      return new bootstrap.Toast(toastEl);
    });
    toastList.forEach(function(toast) {
      toast.show();
    });
  });
</script>
<?php
include("TopMenu.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Include the connection file
    $conn = mysqli_connect('localhost', 'root', '', 'vroomcarrental');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } // Update this with your database connection file

    // Check if the register-btn is set in the POST request
    if (isset($_POST['register-btn'])) {
        // Validate input fields
      
            $password = $_POST['password'];
            $name = $_POST['firstname'];
            $number = $_POST['number'];
            $email = $_POST['email'];
            $accType = 0; // Assuming default account type is 0

            // Generate UserID
            $randomNumber = mt_rand(1000, 9999);
            $userId = "Co" . $randomNumber . "iD";

            // SQL query to insert data into the database
            $query = "INSERT INTO users (UserID, Name, Number, Email, Password, AccType) VALUES (?, ?, ?, ?, ?, ?)";

            // Prepare and bind parameters
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssssi", $userId, $name, $number, $email, $password, $accType);

            // Execute the statement
            if ($stmt->execute()) {
                // Redirect to the login page with a success message
                  echo '<div class="toast-container top-0 start-50 translate-middle-x p-3">
                        <div class="toast show fade text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                          <div class="toast-body">
                            <div class="d-flex gap-4">
                              <span class="text-primary"><i class="fa-solid fa-circle-info fa-lg"></i></span>
                              <div class="d-flex flex-grow-1 align-items-center">
                                <span class="fw-semibold">Login successful! Redirecting...</span>
                                <button type="button" class="btn-close btn-close-sm btn-close-black ms-auto" data-bs-dismiss="toast"
                                  aria-label="Close"></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      ';
                // Redirect to the login page after a delay
                echo '<script>
                      setTimeout(function() {
                        window.location.href = "login.php";
                      }, 700);
                    </script>';

            } else {

                  echo '<div class="toast-container top-0 start-50 translate-middle-x p-3">
                        <div class="toast show fade text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                          <div class="toast-body">
                            <div class="d-flex gap-4">
                              <span class="text-primary"><i class="fa-solid fa-circle-info fa-lg"></i></span>
                              <div class="d-flex flex-grow-1 align-items-center">
                                <span class="fw-semibold">Error: ' . $stmt->error . '</span>
                                <button type="button" class="btn-close btn-close-sm btn-close-black ms-auto" data-bs-dismiss="toast"
                                  aria-label="Close"></button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>';

                exit; // Terminate script execution
            }

            // Close statement
            $stmt->close();
    } // <-- Move this closing brace here
 
$conn->close();
}

// Close connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">            
             <h1 class="card-title text-center">Register</h1>
                <p class="text-dark pt-4 pb-4 text-center">Create your account. It's free and only takes a minute.</p>
                <!-- Registration form -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="mx-auto">
                  <!-- Grid layout for form fields -->
                  <div class="row g-3">
                    <div class="col-md-12">
                      <input type="text" name="firstname" placeholder="Full Name" class="form-control" required>
                    </div>
                  </div>
                  <div class="mt-3">
                    <input type="text" name="number" placeholder="Number" class="form-control" required>
                  </div>
                  <div class="mt-3">
                    <input type="text" name="email" placeholder="Email" class="form-control" required>
                  </div>
                  <div class="mt-3">
                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                  </div>
                    
                  </div>
                  <div class="mt-4">
                    <!-- Register button -->
                    <button class="btn btn-primary w-100" name="register-btn">Register Now</button>
                    <!-- Login link -->
                    <p class="mt-2 text-muted">I already have an account <a href="login.php" class="fw-bold text-decoration-none">Login Now</a></p>
                  </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- JavaScript libraries -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
