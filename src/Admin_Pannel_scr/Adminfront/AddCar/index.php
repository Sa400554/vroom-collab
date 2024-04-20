<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vroom Admin </title>
    <link rel="stylesheet" href="\Adminfront\style3.css">
    <link rel="stylesheet" href="\Adminfront\Inventory\Inventory.css">
    <link rel="stylesheet" href="AddcarStyle1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>
    <section class="Nav-bar">
        <div class="vroom-title">
            <div class="Vroom-Logo">
                VROOM
            </div>
            <div class="Vroom-slogen">
                Rent. Explore. Experience.

            </div>
        </div>
        <div class="nav-content">
            <ul>
                <a href="\Adminfront\index.html" class="Link">
                    <li>
                        <div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/813/813670.png"></div>
                        Dashboard
                    </li>
                </a>
                <a href="\Adminfront\OrderList.html" class="Link">
                    <li>
                        <div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/12657/12657036.png">
                        </div>Order Detail
                    </li>
                </a>
                <a href="\Adminfront\Employee.html" class="Link">
                    <li>
                        <div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/1324/1324372.png"></div>
                        Employee
                    </li>
                </a>
                <a href="\Adminfront\Inquires\Inquires.php" class="Link">
                    <li>
                        <div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/6500/6500779.png"></div>
                        Inquires
                    </li>
                </a>
                <a href="\Adminfront\Inventory\Inventory.php" class="Link" id="Active">
                    <li>
                        <div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/15546/15546746.png">
                        </div>Inventory
                    </li>
                </a>
            </ul>
        </div>
    </section>
    <section class="Right-container">
        <div class="Hori-nav">
            <div class="search">
                <p1>Inventory Details > Add Inventory</p1>
                <p>Your Product Inventory!</p>
            </div>
            <div class="info">
                <div class="Admin-Name">Hello, Admin</div>
                <div class="profile"></div>
            </div>
        </div>
        <div class=" Add-Btn"><a class="btn btn-primary" href="\Adminfront\Inventory\Inventory.php">Back</a></div>

        <form action="connect.php" method="post" enctype="multipart/form-data">
            <div class="container" >
                <div class="img" id="imgBox">
                    <input type="file" accept="image/*" name="image" id="file" style="display: none; " onchange="loadFile(event)">
                    <label for="file"><img src="https://cdn-icons-png.flaticon.com/128/1092/1092220.png" alt="Upload"></label>
                </div>

                    <div class="content ">
                        <div class="upper-input ">
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    </section>
</body>

</html>