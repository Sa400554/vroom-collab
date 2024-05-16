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
    <link rel="stylesheet" href="\Adminfront\style.css">
    <link rel="stylesheet" href="\Adminfront\Inventory\Inventory.css">
    <link rel="stylesheet" href="AddcarStyle1.css">

</head>

<body>
   
    <section class="Right-container">
        <div class="Hori-nav">
            <div class="search">
                <p1>Inventory Details > Edit Inventory</p1>
                <p>Your Product Inventory!</p>
            </div>

        </div>
        <div class="Add-Btn"><a href="\Adminfront\Inventory\Inventory.php">Back</a></div>

        <form action="connect.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="img" id="imgBox">
                    <input type="file" accept="image/*" name="image" id="file" style="display: none; " onchange="loadFile(event)">
                    <label for="file"><img src="https://cdn-icons-png.flaticon.com/128/1092/1092220.png" alt="Upload"></label>
                </div>

                    <div class="content">
                        <div class="upper-input">
                            <p>Details : </p>
                                <input id="CarName" name="CarName" placeholder="Name ( e.g. Porsche 911 GT3 )">
                                <input id="CarSeats" name="CarSeats" type="number" placeholder="Seat's ( e.g. 5 People )">
                                <input id="CarCapacity" name="CarCapacity" placeholder="Capacity ( e.g. 1 Big & 1 Small Bag )">
                                <input id="CarTransmission" name="CarTransmission" placeholder="Transmission ( e.g. Manual)">
                            </div>
                            <div class="mid-input">
                            <p>Rental Type : </p>
                            <input id="StartLocation" name="StartLocation" placeholder="From ( e.g. Pokhara )">
                            <input id="EndLocation" name="EndLocation" placeholder="To ( e.g. Kathmadu )" >
                            <input id="FromToPrice" name="FromToPrice" type="number" placeholder="From To Price ( e.g. Rs. 8000 )" >
                            <input id="PricePerKm" name="PricePerKm" type="number" placeholder="Rs. / Km ( e.g. 200 / Km )">
                            
                        </div>
                        <div class="lower-input">
                            <input id="CarType" name="CarType" placeholder="Enter Car Type ( e.g. Pick Up)">
                            
                        </div>
                        <div class="final">
                            <input type="submit" class="submit_btn" onclick="submit();" value="Submit">
                        </div>
                    </div>

            </div>
        </form>

        <script src="Main.js"></script>
    </section>
</body>

</html>