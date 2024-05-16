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
include ("TopMenu.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Include the connection file
    $conn = mysqli_connect('localhost', 'root', '', 'vroomcarrental');

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } // Update this with your database connection file

    // Check if the register-btn is set in the POST request
    if (isset($_POST['send'])) {
        // Validate input fields

        $name = $_POST['Name'];
        $content = $_POST['content'];


        $sql = "INSERT INTO `inquires`(Name,InquireBody,UserId) VALUES (?,?,?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $name,$content ,$_SESSION['user_id']);

        // Execute the statement
        // Execute the statement
        if ($stmt->execute()) {
    // Success message
            echo '<div class="toast-container top-0 start-50 translate-middle-x p-3">
                        <div class="toast show fade text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body">
                            <div class="d-flex gap-4">
                            <span class="text-primary"><i class="fa-solid fa-circle-info fa-lg"></i></span>
                            <div class="d-flex flex-grow-1 align-items-center">
                                <span class="fw-semibold">Your Inquiry Was sent</span>
                                <button type="button" class="btn-close btn-close-sm btn-close-black ms-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>';
        } else {
            // Error message
            echo '<div class="toast-container top-0 start-50 translate-middle-x p-3">
                        <div class="toast show fade text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body">
                            <div class="d-flex gap-4">
                            <span class="text-primary"><i class="fa-solid fa-circle-info fa-lg"></i></span>
                            <div class="d-flex flex-grow-1 align-items-center">
                                <span class="fw-semibold">Error: ' . mysqli_error($conn) . '</span>
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



    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry</title>
</head>
<link rel="stylesheet" href="index2.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
    integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet"
    integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
<style>
    .wrapper {
        height: 60vh;
        background: #242f3e;
        background-size: cover;
        border-radius: 14px;
        width: 80%
    }

    .overlay {
        width: 100%;
        height: 60vh;
        background: #242f3e;
    }

    .contact-us {
        margin-top: 50px;
        margin-bottom: 50px
    }

    .contact-us h3,
    p {
        color: #fff
    }

    .address {
        margin-top: 14px !important;
        margin-left: 10px
    }

    .address span {
        color: #06af52
    }

    .icons {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: #fff;
        display: inline-block;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .icons i {
        font-size: 20px
    }

    .forms {
        border-radius: 14px;
        padding: 20px
    }

    .inputs input {
        margin-bottom: 13px;
        border: none;
        border-bottom: 2px solid #eee
    }

    .inputs input:focus {
        margin-bottom: 13px;
        border: none;
        border-bottom: 2px solid #06af52;
        box-shadow: none
    }

    .inputs textarea {
        margin-bottom: 13px;
        border: none;
        border-bottom: 2px solid #eee;
        width: 100%;
        resize: none
    }

    .inputs textarea:focus {
        margin-bottom: 13px;
        border: none;
        border-bottom: 2px solid #06af52;
        box-shadow: none;
        resize: none
    }

    .form-control {
        padding: .375rem .25rem
    }
</style>

<body>
    <div class="container ">
        <div class="row justify-content-center mt-5">

            <div class="wrapper ">
                <div class="overlay">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-md-9">
                            <div class="contact-us text-center">
                                <h3>Contact Us</h3>
                                <p class="mb-12">At Your service 24-7</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mt-5 text-center px-3">
                                            <div class="d-flex flex-row align-items-center"> <span class="icons"><i
                                                        class="fa fa-map-marker"></i></span>
                                                <div class="address text-left"> <span>Address</span>
                                                    <p>Naxal, Kathmandu, Nepal</p>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mt-3"> <span class="icons"><i
                                                        class="fa fa-phone"></i></span>
                                                <div class="address text-left"> <span>Phone</span>
                                                    <p>+977 9812345567</p>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center mt-3"> <span
                                                    class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-envelope"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                                    </svg></span>
                                                <div class="address text-left"> <span>Mail</span>
                                                    <p>Vroom@help.com</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-center px-1">
                                            <div class="forms p-4 py-5 bg-white">
                                                <h5>Send Message</h5>
                                                <div class="mt-4 inputs"> <input name="Name" type="text" class="form-control" value="<?php echo '' . $_SESSION['user_name'] ?>"
                                                        placeholder="Name"><textarea  name = "content"class="form-control"
                                                        placeholder="Type your message"></textarea> </div>
                                                <div class="button mt-4 text-left" > <button
                                                        class="btn btn-dark" name="send">Send</button> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</html>