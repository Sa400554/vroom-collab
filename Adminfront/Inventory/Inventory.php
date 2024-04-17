<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vroom Admin </title>
    <link rel="stylesheet" href="\Adminfront\style.css">
    <link rel="stylesheet" href="Inventory.css">

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
                <a href="index.html" class="Link" ><li><div class="nav-icons" ><img src="https://cdn-icons-png.flaticon.com/128/813/813670.png"></div>Dashboard</li></a>
                <a href="OrderList.html" class="Link"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/12657/12657036.png"></div>Order Detail</li></a>
                <a href="Employee.html" class="Link"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/1324/1324372.png"></div>Employee</li></a>
                <a href="Inquires.html" class="Link"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/6500/6500779.png"></div>Inquires</li></a>
                <a href="\Adminfront\Inventory\Inventory.php" class="Link"id="Active"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/15546/15546746.png"></div>Inventory</li></a>
              </ul>
        </div>
    </section>
    <section class="Right-container">
        <div class="Hori-nav">
            <div class="search"> 
                <p1>Inventory Details</p1>
                <p>Your Product Inventory!</p>
            </div>
            <div class="info">
                <div class="Admin-Name">Hello, Admin</div>
                <div class="profile"></div>
            </div>
        </div>
        <div class="Add-Btn"><a href="\Adminfront\AddCar\index.php" >Add Car</a></div>
        <div class = "Inventory">

        </div>
    </section>
    <script src="Main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            getdata();
        });

        function getdata()
        {
            $.ajax({
                type: "GET",
                url: "fetch.php",
                success: function (response) {
                    // console.log(response);
                    $.each(response, function (key, value) { 
                        console.log(value['Name']);
                        $('.Inventory').append(`<div class="Item-container">
                                                <div class="Car-Name-Type">
                                                    <h3>${value['Name']}</h3>
                                                    <h5>${value['Type']}</h5>
                                                </div>
                                                <div class="Car-img">
                                                </div>
                                                <div class="car-details">
                                                    <div class="fule">${value['Capacity']} L</div>
                                                    <div class="transmission">${value['Transmission']}</div>
                                                    <div class="capacity">${value['Seats']} people </div>
                                                </div>
                                                <div class="price-edit">
                                                    <div class="Price-per-day"><h3>$ ${value['PricePerKm']}/km</h3></div>
                                                    <div class="edit"><a href="Edit/index.php">Edit</a></div>
                                                </div>
                                            </div>`);
                    });
                }
            });
        }
    </script>
</body>
</html>