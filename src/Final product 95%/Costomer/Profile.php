<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'));
        var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl);
        });
        toastList.forEach(function (toast) {
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
    if (isset($_POST['Update'])) {
        // Validate input fields

        $name = $_POST['Name'];
        $phone = $_POST['Phone'];
        $email = $_POST['Email'];

        // Update the user's information in the database
        $sql = "UPDATE users SET Name=?, Number=?, Email=? WHERE UserID=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $phone, $email, $_SESSION['user_id']);

        // Execute the statement
        if ($stmt->execute()) {

            echo '<div class="toast-container top-0 start-50 translate-middle-x p-3">
                                <div class="toast show fade text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-body">
                                    <div class="d-flex gap-4">
                                    <span class="text-primary"><i class="fa-solid fa-circle-info fa-lg"></i></span>
                                    <div class="d-flex flex-grow-1 align-items-center">
                                        <span class="fw-semibold">Profile Updated Successfully !</span>
                                        <button type="button" class="btn-close btn-close-sm btn-close-black ms-auto" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>';

            echo '<div class="toast-container top-30 start-50 translate-middle-x p-3">
                                <div class="toast show fade text-bg-warning" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-body">
                                    <div class="d-flex gap-4">
                                    <span class="text-primary"><i class="fa-solid fa-circle-info fa-lg"></i></span>
                                    <div class="d-flex flex-grow-1 align-items-center">
                                        <span class="fw-semibold">Please note that in order to view the changes, you ll need to log in again. Thank you for your cooperation</span>
                                        <button type="button" class="btn-close btn-close-sm btn-close-black ms-auto" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>';
        } else {

            echo '<div class="toast-container top-0 start-50 translate-middle-x p-3">
                                <div class="toast show fade text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
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
    }

    if (isset($_POST['Change'])) {
        // Check if new password matches confirm password
        if ($_POST['newPass'] === $_POST['confirmPass']) {
            $newPassword = $_POST['newPass'];
            $oldPassword = $_POST['oldPass'];

            $sql = "SELECT Password FROM users WHERE UserID=?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_id']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_result($stmt, $dbPassword);
            mysqli_stmt_fetch($stmt);


            if ( $oldPassword == $dbPassword) {


                $sql = "UPDATE users SET Password=? WHERE UserID=?";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "ss", $newPassword, $_SESSION['user_id']);

                // Execute the statement
                if ($stmt->execute()) {

                    echo '<div class="toast-container top-0 start-50 translate-middle-x p-3">
                                <div class="toast show fade text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-body">
                                    <div class="d-flex gap-4">
                                    <span class="text-primary"><i class="fa-solid fa-circle-info fa-lg"></i></span>
                                    <div class="d-flex flex-grow-1 align-items-center">
                                        <span class="fw-semibold">Password updated successfully</span>
                                        <button type="button" class="btn-close btn-close-sm btn-close-black ms-auto" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>';
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
            } else {
                echo '<div class="toast-container top-0 start-50 translate-middle-x p-3">
                                <div class="toast show fade text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-body">
                                    <div class="d-flex gap-4">
                                    <span class="text-primary"><i class="fa-solid fa-circle-info fa-lg"></i></span>
                                    <div class="d-flex flex-grow-1 align-items-center">
                                        <span class="fw-semibold">Old password does not match</span>
                                        <button type="button" class="btn-close btn-close-sm btn-close-black ms-auto" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>'; 
            }
        } else {

            echo '<div class="toast-container top-0 start-50 translate-middle-x p-3">
                                <div class="toast show fade text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-body">
                                    <div class="d-flex gap-4">
                                    <span class="text-primary"><i class="fa-solid fa-circle-info fa-lg"></i></span>
                                    <div class="d-flex flex-grow-1 align-items-center">
                                        <span class="fw-semibold">New password and confirm password do not match</span>
                                        <button type="button" class="btn-close btn-close-sm btn-close-black ms-auto" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>';
        }
    }



    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<link rel="stylesheet" href="index2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
    integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet"
    integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">

<body>
    <div class="container Massage">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Page title -->
                <div class="my-5">
                    <h3>My Profile</h3>
                    <hr>
                </div>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="mx-auto">
                    <div class="col-xxl-6 mb-5 mb-xxl-0">
                        <div class="bg-secondary-soft px-4 py-5 rounded">
                            <div class="row g-3">
                                <h4 class="mb-4 mt-0">Detail</h4>
                                <div class="mb-2 row">
                                    <h6 class="col-sm-1">UserID:</h6>
                                    <h6 class="col-sm-1"><?php echo '' . $_SESSION['user_id'] ?></h6>
                                </div>
                
                                <div class="col-md-6">
                                    <label class="form-label"> Name *</label>
                                    <input type="text" class="form-control" name="Name" placeholder="Jane" aria-label="name"
                                        value="<?php echo '' . $_SESSION['user_name'] ?>">
                                </div>
                
                                <!-- Phone number -->
                                <div class="col-md-6">
                                    <label class="form-label">Phone number *</label>
                                    <input type="text" class="form-control" name="Phone" placeholder="+977 9842000000"
                                        aria-label="Phone number" value="<?php echo '' . $_SESSION['user_Ph'] ?>">
                                </div>
                
                                <!-- Email -->
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Email *</label>
                                    <input type="email" class="form-control" name="Email" placeholder="example@gmail.com"
                                        value="<?php echo '' . $_SESSION['user_email'] ?>">
                                </div>
                                <div class="gap-3 d-md-flex justify-content-md-start text-center">
                                    <button class="btn btn-primary btn-lg" name="Update">
                                        Update Profile
                                    </button>
                                </div>
                            </div> <!-- Row END -->
                        </div>
                    </div>
                </form>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="mx-auto">
                    <div class="col-xxl-6 mb-5 mb-xxl-0">
                        <div class="bg-secondary-soft px-4 py-5 rounded">
                            <div class="row g-3">
                                <h4 class="my-4">Change Password</h4>
                                <!-- Old password -->
                                <div class="col-md-6">
                                    <label for="oldPassword" class="form-label">Old password *</label>
                                    <input type="password" name="oldPass" class="form-control" >
                                </div>
                                <!-- New password -->
                                <div class="col-md-6">
                                    <label for="newPassword" class="form-label">New password *</label>
                                    <input type="password" name="newPass" class="form-control" >
                                </div>
                                <!-- Confirm password -->
                                <div class="col-md-12">
                                    <label for="confirmNewPassword" class="form-label">Confirm Password *</label>
                                    <input type="password" name="confirmPass" class="form-control" >
                                </div>
                                <div class="gap-3 d-md-flex justify-content-md-start text-center">
                                    <button class="btn btn-primary btn-lg" name="Change">
                                        Change Password
                                    </button>
                                </div>
                            </div> <!-- Row END -->
                        </div>
                    </div>
                </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</html>