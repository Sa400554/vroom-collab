<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vroom Car Rental</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">

<body>
<!-- Your HTML code -->

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid "style="padding:10px;" >
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><h2>VROOM</h2></a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left:70px;">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                        </svg> +977 9841312141</a>
                </li>
                <div class="container-nav d-flex">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="/Costomer/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "href="Inquiry.php">Inquiry</a>
                    </li>
                </div>
            </ul>
            <?php
            if (isset($_SESSION['user_id'])) {
                echo'<div class="d-flex justify-content-center">
                <a href="Profile.php"><h6 class="text-primary">Hello, ' . $_SESSION['user_name'] . '</h6></a>
                
                </div>';
                
                echo ' 
                        <button  style="margin-right:20px; margin-left:20px" class="btn btn-discovery btn-opacity-50 position-relative " onclick="Order()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-danger" id="notificationCount">
                            
                            <span class="visually-hidden">unread messages</span>
                        </span>
                        </button>
                        <a href="logout.php" style="margin-right:20px; margin-left:" class="btn btn-danger btn-opacity-50" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Log out"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                            <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3zm1 13h8V2H4z"/>
                            <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0"/>
                        </svg></a>
                        ';
            } else {
                echo '<form class="d-flex" role="login">
                        <a class="btn btn-success btn-opacity-50" href="login.php" style="margin-right:20px; padding:10px 30px;">Sign In</a>
                    </form>';
            }
            ?>
        </div>
    </div>
</nav>
<script>
    const element = document.querySelector('#target');
const tooltip = new bootstrap.Tooltip(element);

</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    function Order(){
        window.location.href = 'yourBooking.php';

    }
</script>
<script>
        $(document).ready(function () {
            updateNotification();
            setInterval(updateNotification, 2000); // Update every 2 seconds
        });

        function updateNotification() {
            var user_ID = '<?php echo $_SESSION['user_id']; ?>';
            // Send AJAX request to check for new notifications
            $.ajax({
                type: "POST",
                url: "CarDetails.php",
                data: {
                    'checking_notification': true,
                    'user_id':user_ID,
                },
                success: function (response) {
                    if (response > 0) {

                        $('#notificationCount').text(response);

                    } else {
                    $('#notificationCount').text('');

                }
                }
            });
        }

    </script>
</body>

</html>
