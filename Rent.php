<?php
include ("TopMenu.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vroom Car Rental</title>
</head>
<link rel="stylesheet" href="Rent2.css">
<link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet"
    integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">

<body>

    <div class="container" style="padding:30px; width:40%;">
        <form class="d-flex">
            <input class="form-control me-2" type="search" name="search" id="SearchLocationInput"
                placeholder="Search Location" aria-label="Search">
            <button class="btn btn-primary" type="button" id="SearchLocationBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                    viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                </svg>
            </button>
        </form>
    </div>
    <div class="container">
        <div class="searchItem">

        </div>
        <div class="Inventory">
            <div class="container" style="margin-top: 2rem;">
                <div class="alert alert-danger" role="alert">
                    <div class="d-flex gap-4">
                        <span><i class="fa-solid fa-circle-question icon-discovery"></i></span>
                        <div class="d-flex flex-column gap-2">
                            <h6 class="mb-0">No cars available</h6>
                            <p class="mb-0">Please log in to view listings.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" id="BookModel" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="Car-Name"></h5>
                    <input type="hidden" id="carIDHidden">
                    <input type="hidden" id="carNameHidden">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <figure class="figure">
                        <img src="https://images.unsplash.com/photo-1551830820-330a71b99659?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="figure-img img-fluid rounded" alt="...">
                    </figure>


                    <h5 class="text-primary">Car Specifications :
                        <hr>
                    </h5>
                    <div class="container row justify-content-center">
                        <table class="table table-striped carSpecs">

                            <tbody>
                                <tr>
                                    <th scope="row">Seats Available : </th>
                                    <td id="Seats">5 People</td>
                                    <th scope="row">Fuel Capacity : </th>
                                    <td id="Capacity">50 L</td>
                                </tr>
                                <th scope="row">Transmission : </th>
                                <td id="Transmission">Manual</td>

                                <th scope="row">Type : </th>
                                <td id="Type">Pickup</td>
                                <tr>
                                    <th scope="row">Start Location : </th>
                                    <td id="StartLocation"></td>
                                    <th scope="row">End Location : </th>
                                    <td id="EndLocation"></td>
                                </tr>
                                <tr>
                                    <th scope="row">From To Price :</th>
                                    <td id="FromToPrice">Rs.200000 </td>

                                    <th scope="row"> Price Per Km : </th>
                                    <td id="PricePerKm">$ 300/Km</td>
                                </tr>

                            </tbody>
                        </table>
                        <h6 class="text-primary">Change Payment Type : </h6>
                        <div class="container UserData">
                            <label class="alert alert-warning" id="PaymentAlart"
                                style="padding: 0.2rem 1rem; font-size: 0.875rem;">Check This field to Select Default
                                End Location</label>
                            <div class="form-check" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-arrow-auto"
                                data-bs-title="Hello World">
                                <input class="form-check-input" type="checkbox" value="" id="PaymentMethod" />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Location Pricing
                            </div>
                        </div>
                        </label>

                        <div class="row mb-3" id="DistanceField">
                            <hr>
                            <label for="colFormLabelSm"
                                class="col-sm-4 col-form-label col-form-label-sm text-primary costumerNumber">Distance
                                In Km : </label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control form-control-sm" id="Distance"
                                    placeholder=" (E.g. If End Location : Mustang Then 500 Km)">
                            </div>
                            <table class="table table-striped carSpecs">
                                <tbody>
                                    <tr>
                                        <th scope="row">Estimated Pricing (Rs.) :</th>
                                        <td class="Pricing text-success"></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="row mb-3">
                            <hr>
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                echo '<label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm text-success costumerNumber">Hello , ' . $_SESSION['user_name'] . ' </label>';
                                echo ' <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-primary costumerNumber">Number : </label>
                            <div class="col-sm-10">
                                <input type="text" inputmode="numeric" pattern="[0-9]*" id="CostumerNumber" class="form-control form-control-sm border border-success" placeholder="Enter number" value=' . $_SESSION['user_Ph'] . '>
                            </div>
                            <hr>
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-primary costumerEmail">Email : </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control form-control-sm border border-success" id="CostumerMail" placeholder="JohnDoe@example.com" value=' . $_SESSION['user_email'] . '>
                            </div>';

                            } else {
                                echo ' <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-primary costumerNumber">Number : </label>
                            <div class="col-sm-10">
                                <input type="text" inputmode="numeric" pattern="[0-9]*" id="CostumerNumber" class="form-control form-control-sm" placeholder="Enter number">
                            </div>
                            <hr>
                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm text-primary costumerEmail">Email : </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control form-control-sm" id="CostumerMail" placeholder="JohnDoe@example.com">
                            </div>';
                            }
                            ?>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary confirmOrder">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

        <script>
            $(document).ready(function () {

                getdata();
                $('#Distance').keyup(function () {
                    var Distance = $('#PricePerKm').text();
                    var Price = Distance * $('#Distance').val();
                    $('.Pricing').text(Price);
                    // console.log(Price);
                })

                $('#PaymentMethod').change(function () {
                    if (this.checked) {
                        $('#DistanceField').hide();
                        $('#PaymentAlart').hide();
                    } else {
                        $('#DistanceField').show();
                        $('#PaymentAlart').show();
                    }
                });


        
                $(document).on("click", ".confirmOrder", function () {

                    var carId = $('#carIDHidden').text();
                    var UserID = '<?php echo '' . $_SESSION['user_id'] ?>';
                    var carName = $('#carNameHidden').text();
                    var PaymentCheck = $('#PaymentMethod').prop('checked');
                    var startLocation = $('#StartLocation').text();
                    if (PaymentCheck) {
                        var paymentType = "Location Pricing";
                        var destination = $('#EndLocation').text();
                    } else {
                        var paymentType = " PricePerKm";
                        var destination = $('#Distance').val();
                        var estimatedPrice = $('.Pricing').text();
                    }
                    var cMail = $('#CostumerMail').val();
                    var cNum = $('#CostumerNumber').val();
                    function generateOrderId() {
                        var randomNumber = Math.floor(Math.random() * 9000) + 1000;
                        var orderId = 'Co' + randomNumber + 'ID';
                        return orderId;
                    }
                    $.ajax({
                        type: "POST",
                        url: "CarDetails.php",
                        data: {
                            'checking_update': true,
                            'car_id': carId,
                            'User_id': UserID,
                            'carName': carName,
                            'estimatedPrice': estimatedPrice,
                            'orderId': orderId = generateOrderId(),
                            'startLocation': startLocation,
                            'destination': destination,
                            'paymentType': paymentType,
                            'cMail': cMail,
                            'cNum': cNum,
                        },
                        success: function (response) {
                            $('#BookModel').modal('hide');
                            $('.modal-backdrop').remove();
                            $('#BookModel').addClass('modal'); // Add the 'modal' class back to the modal element
                        }

                    });
                });
                //?BookBtn
                $(document).on("click", ".bookBtn", function () {

                    var carId = $(this).closest('.Item-container').find('.carID').text();
                    var carName = $(this).closest('.Item-container').find('.carName').text();
                    $('#Car-Name').text(`Booking : ${carName} (${carId})`);
                    $('#carIDHidden').text(`${carId}`);
                    $('#carNameHidden').text(`${carName}`);
                    $.ajax({
                        type: "POST",
                        url: "CarDetails.php",
                        data: {
                            'checking_edit': true,
                            'CarID': carId
                        },
                        dataType: 'json', // Expecting JSON response
                        success: function (response) {

                            // console.log(response);
                            $.each(response, function (key, carView) {
                                console.log(carView);
                                $('#Car-ID').text(carView['CarID']);
                                $('#Name').text(carView['Name']);
                                $('#Seats').text(carView['Seats']);
                                $('#Capacity').text(carView['Capacity']);
                                $('#Transmission').text(carView['Transmission']);
                                $('#StartLocation').text(carView['StartLocation']);
                                $('#EndLocation').text(carView['EndLocation']);
                                $('#FromToPrice').text(carView['FromToPrice']);
                                $('#PricePerKm').text(carView['PricePerKm']);
                                $('#Type').text(carView['Type']);
                            });
                        },
                        error: function (xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                });
                //?BookBtn End
                $(document).ready(function () {

                    $(document).on("click", "#SearchLocationBtn", function () {
                        var Location = $('#SearchLocationInput').val();
                        // Assuming location is a variable containing the value of the location

                        if (Location === "") {
                            $('.Inventory').html("");
                            getdata();
                        } else {
                            $.ajax({
                                type: "POST",
                                url: "CarDetails.php",
                                data: {
                                    'checking_Location': true,
                                    'Location': Location,
                                },
                                dataType: 'json', // Expecting JSON response
                                success: function (response) {
                                    $('.Inventory').html("");
                                    $.each(response, function (key, value) {
                                        
                                        $('.Inventory').append(`<div class="Item-container" style = "margin:30px;">
                                                <div class="Car-Name-Type" >
                                                    
                                                    <div class="carName">${value['Name']} </div>
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
                                                <div class="price-edit ">
                                                    <div class="Price-per-day"><h3>$ ${value['PricePerKm']}/km</h3></div>
                                                    <div class="edit"><a class="btn btn-primary bookBtn" data-bs-toggle="modal" data-bs-target="#BookModel">Book Now</a></div>
                                                </div>
                                            </div>`);
                                    });
                                },
                                error: function (xhr, status, error) {
                                    console.log(xhr.responseText);
                                }
                            });
                        }
                    });
                });
                
                function getBookedCars() {
                    var carIDs = [];
                    $.ajax({
                        type: "POST",
                        url: "CarDetails.php",
                        data: {
                            'checking_Order': true,
                        },
                        dataType: 'json',
                        async: false, // Make the request synchronous
                        success: function (response) {
                            $.each(response, function (key, order) {
                                carIDs.push(order.CarID);
                            });
                        }
                    });
                    return carIDs;
                }

                function getdata() {
                    
                    $.ajax({
                        type: "GET",
                        url: "fetchCars.php",
                        success: function (response) {
                            $('.Inventory').html("");
                            var carIDs = getBookedCars();
                            $.each(response, function (key, value) {
                                var currentCarID = value['CarID'];
                                if (carIDs.includes(currentCarID)) {
                                    console.log("Output:", value);
                                    $('.Inventory').append(`<div class="Item-container" style = "margin:30px; background:#db4f4a56;">
                                                <div class="Car-Name-Type" >
                                                    
                                                    <div class="carName text-secondary">${value['Name']} </div>
                                                    <h6 class="text-secondary">${value['Type']}</h6>
                                                </div>
                                                <div class="Car-img">
                                                <h6 style = 'color:#ffffff00' class = "carID">${value['CarID']}</h6>
                                                </div>
                                                <div class="car-details text-secondary">
                                                    <div class="fule">${value['Capacity']} L</div>
                                                    <div class="transmission">${value['Transmission']}</div>
                                                    <div class="capacity">${value['Seats']} people </div>
                                                </div>
                                                <div class="price-edit text-secondary">
                                                    <div class="Price-per-day"><h6 class = "text-secondary">$ ${value['PricePerKm']}/km</h6></div>
                                                    <div class="edit"><h6 class=" text-danger  " >Booked</h6></div>
                                                </div>
                                            </div>`);
                                }else{
                                    $('.Inventory').append(`<div class="Item-container" style = "margin:30px;">
                                                <div class="Car-Name-Type" >
                                                    
                                                    <div class="carName">${value['Name']} </div>
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
                                                <div class="price-edit ">
                                                    <div class="Price-per-day "><h3>$ ${value['PricePerKm']}/km</h3></div>
                                                    <div class="edit"><a class="btn btn-primary bookBtn" data-bs-toggle="modal" data-bs-target="#BookModel">Book Now</a></div>
                                                </div>
                                            </div>`);
                                }
                                
                            });
                        }
                    });
                }
            });

        </script>
</body>

</html>