<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vroom Admin</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>
<style> 
.Admin{
    background:none;
    font-color:#464255;
}
</style>
<body>

    
    <?php
        if (isset($_SESSION['user_id'])) {
        echo '<section class="Nav-bar">
        <div class="vroom-title">
            <div class="Vroom-Logo">
                VROOM
            </div>
            <div class="Vroom-slogen">
                Rent. Explore. Experience.
            </div>
            <div class="Admin" style="padding-top:5rem;">
                <h6> Hello , '.$_SESSION['user_name'].'</h6>

            </div>
        </div>
        <div class="nav-content">
            <ul>
                
                <a href="\Adminfront\OrderList\OrderList.php" class="Link" id="orderLink">
                    <li>
                        <div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/12657/12657036.png">
                        </div>
                        Order <span class="badge bg-danger" id="orderNotification"
                            style="margin-left:30px; height:20px; font-size:15px;"></span>
                    </li>
                </a>
                <a href="\Adminfront\Employee\Employee.php" class="Link">
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
                <a href="\Adminfront\Inventory\Inventory.php" class="Link">
                    <li>
                        <div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/15546/15546746.png">
                        </div>
                        Inventory
                    </li>
                </a>
            </ul>
        </div>
        <form class="d-flex" role="login" style="background:none; padding-left:50px;">
                                <a class="btn btn-danger btn-opacity-50" href="/Adminfront/logout.php" style="margin-right:20px; padding:10px 30px;">logout</a>
                            </form>
    </section>
    ';
                }
                ?>
    <script>
        $(document).ready(function () {
            updateOrderNotification();
            setInterval(updateOrderNotification, 2000); 
        });

        function updateOrderNotification() {
            $.ajax({
                type: "GET",
                url: "/Adminfront/OrderList/fetchOrders.php", // Adjust the path if needed
                success: function (response) {
                    var orderCount = response.length; 
                    // Loop through the orders to check their status
                    for (var i = 0; i < response.length; i++) {
                        // Assuming the status is stored in the 'status' property
                        if (response[i].Status === 'Confirmed' || response[i].Status === 'Declined') {
                            orderCount--; 
                        }
                    }
                    if (orderCount > 0) {
                    $('#orderNotification').text(orderCount);
                } else {
                    $('#orderNotification').text(''); 
                }
                }
            });
        }
    </script>
     <script>
        $(document).ready(function () {

            getOrderData();
            setInterval(getOrderData, 2000); 

            $(document).on("click", "#confirmOrder", function () {
                var OrderId = $(this).closest('tr').find('#OrderId').text();
                $.ajax({
                    type: "POST",
                    url: "/Adminfront/OrderList/fetchOrders.php", // Separate PHP file for handling update request
                    data: {
                        'OrderId': OrderId,
                        'Confirmed': true,
                        'status': 'Confirmed' // Update status to 'Confirmed'
                    }
                });
                getOrderData();
                updateOrderNotification();
            });
            $(document).on("click", "#NullOrder", function () {
                var OrderId = $(this).closest('tr').find('#OrderId').text();
                $.ajax({
                    type: "POST",
                    url: "/Adminfront/OrderList/fetchOrders.php", // Separate PHP file for handling update request
                    data: {
                        'OrderId': OrderId,
                        'Null': true,
                        'status': 'Null' 
                    }
                });
                getOrderData();
                updateOrderNotification();
            });

            $(document).on("click", "#declineOrder", function () {
                var OrderId = $(this).closest('tr').find('#OrderId').text();
                $.ajax({
                    type: "POST",
                    url: "/Adminfront/OrderList/fetchOrders.php", // Separate PHP file for handling update request
                    data: {
                        'OrderId': OrderId,
                        'Declined': true,
                        'status': 'Declined' // Update status to 'Declined'
                    }
                });
                getOrderData();
                updateOrderNotification();
            });
            
            
            $(document).on("click", "#EditOrder", function () {  
                var OrderId = $(this).closest('tr').find('#OrderId').text();
                

                $.ajax({
                    type: "GET",
                    url: "/Adminfront/connection.php",
                    data: {
                        'OrderId': OrderId,
                        'editOrder': true,
                        'status': 'editOrder'
                    },
                    success: function (response) {

                        $('#EditCars').modal('show'); 
                        $('#Name').val(response.Car);
                        $('#UserId').val(response.UserId);
                        $('#OrderId').val(response.OrderID);
                        if (response.Destination.endsWith(" km")) {
                            $('#EndLocation').val(response.Destination.slice(0, -3));
                        } else {
                            $('#EndLocation').val(response.Destination);
                        }
                        $('#Number').val(response.Number);
                        $('#Email').val(response.Email);
                        $('#estimatedPrice').val(response.estimatedPrice);
                        $('#PaymentType').val(response.PaymentMethod);
                    }
                });
            });



            
        });


        function getOrderData() {
    $.ajax({
        type: "GET",
        url: "fetchOrders.php",
        success: function (response) {
            // Clear existing data before appending new data
            $('.Order-List').empty();

            // Check if there are any orders with a status of 'Null'
            var hasNullStatus = false;
            $.each(response, function (key, value) {
                if (value["Status"] === null) {
                    hasNullStatus = true;
                    return false; // Exit the loop early
                }
            });

            // If there are orders with 'Null' status, show them
            if (hasNullStatus) {
                $('.Empty-Msg').empty();
                $.each(response, function (key, value) {
                    if (value["Status"] == null) {
                        $('.Order-List').append(`<tr>
                            <th scope="row" id="OrderId">${value["OrderID"]}</th>
                            <td>${value["Status"]}</td>
                            <td>${value["Car"]}</td>
                            <td>${value["Destination"]} from ${value["StartLocation"]}</td>
                            <td>${value["Number"]}</td>
                            <td>${value["Email"]}</td>
                            <td>${value["estimatedPrice"]}</td>
                            <td>${value["PaymentMethod"]}</td>
                            <td>
                                <button type="button" class="btn btn-discovery" id="EditOrder">Edit</button>
                                <button type="button" class="btn btn-danger" id="declineOrder">Decline</button>
                                <button type="button" class="btn btn-success" id="confirmOrder">Confirm</button>
                                <button type="button" class="btn btn-secondary" id="NullOrder">Null</button>
                            </td>
                        </tr>`);
                    }
                });
            } else {
                // Show "No Orders" message
                $('.Empty-Msg').empty().append(`
                    <div class="container" style="margin-top: 2rem;">
                        <div class="alert alert-danger" role="alert">
                            <div class="d-flex gap-4 alert-danger">
                                <div class="d-flex flex-column gap-2 ">
                                    <h6 class="mb-0 ">No Orders</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            }
        }
    });
}
    </script>
    

</body>
</html>

   