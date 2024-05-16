 <script>
          var toastElList = [].slice.call(document.querySelectorAll(".toast"));
          var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl);
          });
          toastList.forEach(function(toast) {
            toast.show();
          });
    </script>
<?php
include ("C:/xampp/htdocs/Adminfront/Nav.php");
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
     $query = "SELECT * FROM `Users` WHERE `Email` = ? AND `Password` = ? AND `AccType` = 1";

    // Prepare and bind parameters
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $password);

    // Execute the statement
    $stmt->execute();

    // Check if a matching record is found
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
      // Display toast notification
       $row = $result->fetch_assoc();

            // Start session
  

            // Store user data in session variables
            $_SESSION['user_id'] = $row['UserID'];
            $_SESSION['user_name'] = $row['Name'];
            $_SESSION['user_email'] = $row['Email'];
            $_SESSION['user_Ph'] = $row['Number'];

      echo '<div class="toast-container top-0 start-50 translate-middle-x p-3">
                                <div class="toast show fade bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-body bg-success">
                                    <div class="d-flex gap-4 bg-success">
                                    <span class="text-primary bg-success"><i class="fa-solid fa-circle-info fa-lg"></i></span>
                                    <div class="d-flex flex-grow-1 align-items-center bg-success">
                                        <span class="fw-semibold text-light bg-success"> Loging in ... </span>
                                        <button type="button" class="btn-close btn-close-sm btn-close-black ms-auto" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>';

           echo '<script>
          setTimeout(function() {
            window.location.href = "/Adminfront/OrderList/OrderList.php";
          }, 800);
        </script>';
    } else {
      // Display an alert message if login fails
       echo '<div class="toast-container top-0 start-50 translate-middle-x p-3">
                                <div class="toast show fade bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-body bg-danger">
                                    <div class="d-flex gap-4 bg-danger">
                                    <span class="text-primary bg-danger"><i class="fa-solid fa-circle-info fa-lg"></i></span>
                                    <div class="d-flex flex-grow-1 align-items-center bg-danger">
                                        <span class="fw-semibold text-light bg-danger">Login Filed ! Incorrect Email/Password </span>
                                        <button type="button" class="btn-close btn-close-sm btn-close-black ms-auto" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>';
    }

    // Close statement
    $stmt->close();
  } else {
    // Redirect to the login page with an alert message
     echo '<div class="toast-container top-0 start-50 translate-middle-x p-3">
          <div class="toast show fade text-bg-warning" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
              <div class="d-flex gap-4">
                <span class="text-primary"><i class="fa-solid fa-circle-info fa-lg"></i></span>
                <div class="d-flex flex-grow-1 align-items-center">
                  <span class="fw-semibold">Invalid request method</span>
                  <button type="button" class="btn-close btn-close-sm btn-close-black ms-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
                </div>
              </div>
            </div>
          </div>
        </div>';
    echo "<script>window.location.href = 'login.php';</script>";
  }

  // Close connection
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title >Vroom Admin</title>
  <link rel="stylesheet" href="style2.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
</head>

<body>
  <div class="container"style="background:none; padding-left:12rem;padding-top:15rem;">
    <div class="row justify-content-center mt-5"style="background:none;">
      <div class="col-md-6"style="background:none;">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title text-center text-info">Vroom</h1>
            <h4 class="card-title text-center text-info">Admin Panel</h4>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
              <div class="mb-3">
                <input type="text" name="email" placeholder="Email" class="form-control">
              </div>
              <div class="mb-3">
                <input type="password" name="password" placeholder="Password" class="form-control">
              </div>
        
              <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100" name="login-btn">Login</button>
                <!-- <p class="text-center mt-2">Don't have an account? <a href="register.php">Register Now</a></p> -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
   
</body>

</html>