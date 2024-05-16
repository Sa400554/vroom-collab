<?php
include ("C:/xampp/htdocs/Adminfront/Nav.php");
if (!isset($_SESSION['user_id'])) {
    // Redirect to the index page
    header("Location: /Adminfront/index.php");
    exit(); // Terminate script execution
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vroom Admin </title>
    <link rel="stylesheet" href="style3.css">
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">

</head>
<body>
   
    <section class="Right-container">
        <div class="Hori-nav">
            <div class="search"> 
                <p1>Dashboard</p1>
                <p>Welcom bact to VROOM Admin!</p>
            </div>
            <div class="info">
                <div class="Admin-Name">Hello, Admin</div>
                <div class="profile"></div>
            </div>
        </div>
        <div class="Fill">
            <div class="card">
                <div class="card-1-left">
                    <div>

                    </div>
                </div>
                <div class="card-1-right">
                    <section>
                        <div class="card-value">
                            100
                        </div>
                        <div class="card-info">
                            Total Car Rented
                        </div>
                        <div class="card-date">
                            (30 
                            days)
                        </div>
                    </section>
                </div>
            </div>
            <div class="card">
                <div class="card-1-left">
                    <div>

                    </div>
                </div>
                <div class="card-1-right">
                    <section>
                        <div class="card-value">
                            50
                        </div>
                        <div class="card-info">
                            Total Costomer Accounts
                        </div>
                        <div class="card-date">
                            (30 
                            days)
                        </div>
                    </section>
                </div>
            </div>
            <div class="card">
                <div class="card-1-left">
                    <div>

                    </div>
                </div>
                <div class="card-1-right">
                    <section>
                        <div class="card-value">
                            70k
                        </div>
                        <div class="card-info">
                            Total Revenue Rs.
                        </div>
                        <div class="card-date">
                            (30 
                            days)
                        </div>
                    </section>
                </div>
            </div>
            <div class="card">
                <div class="card-1-left">
                    <div>

                    </div>
                </div>
                <div class="card-1-right">
                    <section>
                        <div class="card-value">
                            40k
                        </div>
                        <div class="card-info">
                            Total Profit Rs.
                        </div>
                        <div class="card-date">
                            (30 
                            days)
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>