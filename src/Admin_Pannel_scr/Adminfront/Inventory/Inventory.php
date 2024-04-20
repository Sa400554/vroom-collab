<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vroom Admin </title>
        <link rel="stylesheet" href="\Adminfront\style2.css">
        <link rel="stylesheet" href="Inventory2.css">
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
                <a href="\Adminfront\index.html" class="Link" ><li><div class="nav-icons" ><img src="https://cdn-icons-png.flaticon.com/128/813/813670.png"></div>Dashboard</li></a>
                <a href="\Adminfront\Adminfront\OrderList.php" class="Link"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/12657/12657036.png"></div>Order Detail</li></a>
                <a href="\Adminfront\Employee\Employee.php" class="Link"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/1324/1324372.png"></div>Employee</li></a>
                <a href="\Adminfront\Inquires\Inquires.php"  class="Link"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/6500/6500779.png"></div>Inquires</li></a>
                <a href="\Adminfront\Inventory\Inventory.php" class="Link"id="Active"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/15546/15546746.png"></div>Inventory</li></a>
            </ul>
        </div>
    </section>
    
    <section class="Right-container">
        <div class="Hori-nav">
                <div class="search"> 
                    <p1>Inventory</p1>
                    <p>Car Collection !</p>
                </div>
                <div class="info">
                    <div class="Admin-Name">Hello, Admin</div>
                    <div class="profile"></div>
                </div>
            </div>
            
            <div class="addcarBtn">
                <a href="\Adminfront\AddCar\index.php" class="btn btn-primary">Add Car</a>

            </div>
        </div>
        <div class="container massage-D">
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div class="toast align-items-center border-0 " id="liveToast"role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex text-bg-danger">
                    <div class="toast-body text-bg-danger">
                    Hello, world! This is a toast message.
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="EditCars" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Details</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="Car-ID">
                            <div class="col-12">
                                <label for="Name">Name</label>
                                <input type="text" class="form-control" id="Name">
                            </div>
                            <div class="col-6">
                                <label for="Seats">Seats</label>
                                <input type="text" class="form-control" id="Seats">
                            </div>
                            <div class="col-6">
                                <label for="Capacity">Capacity</label>
                                <input type="text" class="form-control" id="Capacity">
                            </div>
                            <div class="col-12">
                                <label for="Transmission">Transmission</label>
                                <input type="text" class="form-control" id="Transmission">
                            </div>
                            <div class="col-6">
                                <label for="StartLocation">Start Location</label>
                                <input type="text" class="form-control" id="StartLocation">
                            </div>
                            <div class="col-6">
                                <label for="EndLocation">End Location</label>
                                <input type="text" class="form-control" id="EndLocation">        
                            </div>
                            <div class="col-6">
                                <label for="Type">From To Price</label>
                                <input type="text" class="form-control" id="FromToPrice">
                            </div>
                            <div class="col-6">
                                <label for="Type">Price /Km</label>
                                <input type="text" class="form-control" id="PricePerKm">
                            </div>
                            <div class="col-12">
                                <label for="Type">Type</label>
                                <input type="text" class="form-control" id="Type">
                            </div>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="Car_Delete">Delete</button>
                        <button type="button" class="btn btn-primary " id='Car_D_Update'>Update</button>
                    </div>
                </div>
            </div>
        </div>
    <div class="Inventory" >
        
    </div>
    
    </section>
    <script src="Main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        
        $(document).ready(function () {
            getdata();
            
            $('#Car_Delete').click(function (e) { 
                var car_id = $('#Car-ID').val();
                console.log(car_id);
                $.ajax({
                    type: "POST",
                    url: "Edit.php",
                    data: {
                        'checking_delete': true,
                        'car_id': car_id,
                    },
                    success: function (response) {
                        console.log(response);
                        $('#EditCars').modal('hide');
                        $('.Inventory').html("");
                        getdata();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                        console.error(xhr.responseText);
                    }
                });
            });

            
            $('#Car_D_Update').click(function (e) { 
            e.preventDefault();
            
            var car_id = $('#Car-ID').val();
            var Name = $('#Name').val();
            var Seats = $('#Seats').val();
            var Capacity = $('#Capacity').val();
            var Transmission = $('#Transmission').val();
            var StartLocation = $('#StartLocation').val();
            var EndLocation = $('#EndLocation').val();
            var FromToPrice = $('#FromToPrice').val();
            var PricePerKm = $('#PricePerKm').val();
            var Type = $('#Type').val(); // Corrected selector
            
            if(Name != '' && Seats != '' && Capacity != '' && Transmission != '' && StartLocation != '' && EndLocation != '' && Type != '' && PricePerKm != ''&& FromToPrice != '') {
                $.ajax({
                    type: "POST",
                    url: "Edit.php",
                    data: {
                        'checking_update': true,
                        'car_id': car_id,
                        'Name': Name,
                        'Seats': Seats,
                        'Capacity': Capacity,
                        'Transmission': Transmission,
                        'StartLocation': StartLocation,
                        'EndLocation': EndLocation,
                        'FromToPrice':FromToPrice,
                        'PricePerKm': PricePerKm,
                        'Type': Type,
                    },
                    success: function (response) {
                        $('#EditCars').modal('hide');

                        $('.Inventory').html("");
                        getdata();
                    }
                });
            } 
        });

                $(document).on("click", ".editBtn", function () {
                    var carId = $(this).closest('.Item-container').find('.carID').text();

                    $.ajax({
                        type: "POST",
                        url: "Edit.php",
                        data: {
                            'checking_edit': true,
                            'CarID': carId, // Corrected variable name to match the case
                        },
                        success: function (response) {
                            $('#EditCars').modal('show');

                            // alert(response);
                            // console.log(response);
                            $.each(response, function (key, carView) { 
                                console.log(carView);
                                $('#Car-ID').val(carView['CarID']);
                                $('#Name').val(carView['Name']);
                                $('#Seats').val(carView['Seats']);
                                $('#Capacity').val(carView['Capacity']);
                                $('#Transmission').val(carView['Transmission']);
                                $('#StartLocation').val(carView['StartLocation']);
                                $('#EndLocation').val(carView['EndLocation']);
                                $('#FromToPrice').val(carView['FromToPrice']);
                                $('#PricePerKm').val(carView['PricePerKm']);
                                $('#Type').val(carView['Type']);
                            });
                            
                        }
                    });
                });


            
        });

        function getdata()
        {
            $.ajax({
                type: "GET",
                url: "fetch.php",
                success: function (response) {
                    // console.log(response);
                    $.each(response, function (key, value) { 
                        $('.Inventory').append(`<div class="Item-container">
                                                <div class="Car-Name-Type" >
                                                    
                                                    <h5 class="carName">${value['Name']} </h5>
                                                    <h6>${value['Type']}</h6>
                                                </div>
                                                <div class="Car-img">
                                                <h6 style = 'color:#ffffff00' class = "carID">${value['CarID']}</h6>
                                                </div>
                                                <div class="car-details">
                                                    <div class="fule">${value['Capacity']} L</div>
                                                    <div class="transmission">${value['Transmission']}</div>
                                                    <div class="capacity">${value['Seats']} people </div>
                                                </div>
                                                <div class="price-edit">
                                                    <div class="Price-per-day"><h3>$ ${value['PricePerKm']}/km</h3></div>
                                                    <div class="edit"><a class="btn btn-primary editBtn" id = "liveToastBtn">Edit</a></div>
                                                </div>
                                            </div>`);
                    });
                }
            });
        }
        
    </script>
    
</body>
</html>