

<?php
include ("TopMenu.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link rel="stylesheet" href="index2.css">
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet"
        integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="margin-top: 2rem;">
        <div class="alert alert-success" role="alert">
            <div class="d-flex gap-4">
                <span><i class="fa-solid fa-circle-question icon-discovery"></i></span>
                <div class="d-flex flex-column gap-2">
                    <h6 class="mb-0">Your Orders</h6>
                    <p class="mb-0">Your orders are listed here!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" >
        <div class="" id="ordersContainer"style="flex-wrap: wrap; display: flex; justify-content:space-between;">

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            getOrders();
            setInterval(getOrders, 2000);
        });

        function getOrders() {
            var user_ID = '<?php echo $_SESSION['user_id']; ?>';
            $.ajax({
                type: "POST",
                url: "CarDetails.php",
                data: {
                    'checking_checkOrder': true,
                    'User_ID': user_ID,
                },
                dataType: 'json',
                success: function (response) {
                    if (response.length > 0) {
                        $('#ordersContainer').empty();
                        $.each(response, function (key, order) {
                            if(order.Status == 'Declined'){
                                var orderHTML = `
                                <div class="card " style = "width: 30rem; height: 32rem; margin:30px; background:#db4f4a56">
                                <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    class="card-img-top" alt="green iguana" />
                                <div class="card-body">
                                    <h4 id="CarNameId">${order.Car} (${order.CarID})</h4>
                                    <h6  id="OrdId">Order ID : ${order.OrderID}</h6>
                                    <p class="card-text">
                                    <table class="table table-striped">
    
                                        <tbody>
                                            <tr>
                                                <th scope="row">Estimated Price : </th>
                                                <td id="estimated">${order.estimatedPrice}</td>
                                                <th scope="row">Destination : </th>
                                                <td id="destination">${order.Destination}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pickup Location : </th>
                                                <td id="StartLocation">${order.StartLocation}</td>
                                                <th>
                                                    Order Status :
                                                </th>
                                                <td scope="row" id="OrderStatus">${order.Status}</td>
                                            </tr>
    
    
                                        </tbody>
                                        </table>
                                        </p>
                                        
                            </div>
                                `;
                                $('#ordersContainer').append(orderHTML);
                            }else if(order.Status == 'Confirmed'){
                                var orderHTML = `
                                <div class="card " style = "width: 30rem; height: 32rem; margin:30px; background:#5bdb4a56">
                                <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    class="card-img-top" alt="green iguana" />
                                <div class="card-body">
                                    <h4 id="CarNameId">${order.Car} (${order.CarID})</h4>
                                    <h6  id="OrdId">Order ID : ${order.OrderID}</h6>
                                    <p class="card-text">
                                    <table class="table table-striped">
    
                                        <tbody>
                                            <tr>
                                                <th scope="row">Estimated Price : </th>
                                                <td id="estimated">${order.estimatedPrice}</td>
                                                <th scope="row">Destination : </th>
                                                <td id="destination">${order.Destination}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pickup Location : </th>
                                                <td id="StartLocation">${order.StartLocation}</td>
                                                <th>
                                                    Order Status :
                                                </th>
                                                <td scope="row" id="OrderStatus">${order.Status}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </p>
                                </div>
                            </div>
                                `;
                                $('#ordersContainer').append(orderHTML);
                            }else{
                                var orderHTML = `
                                <div class="card " style = "width: 30rem; height: 32rem; margin:30px;">
                                <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                    class="card-img-top" alt="green iguana" />
                                <div class="card-body">
                                    <h4 id="CarNameId">${order.Car} (${order.CarID})</h4>
                                    <h6  id="OrdId">Order ID : ${order.OrderID}</h6>
                                    <p class="card-text">
                                    <table class="table table-striped">
    
                                        <tbody>
                                            <tr>
                                                <th scope="row">Estimated Price : </th>
                                                <td id="estimated">${order.estimatedPrice}</td>
                                                <th scope="row">Destination : </th>
                                                <td id="destination">${order.Destination}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pickup Location : </th>
                                                <td id="StartLocation">${order.StartLocation}</td>
                                                <th>
                                                    Order Status :
                                                </th>
                                                <td scope="row" id="OrderStatus">${order.Status}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </p>
                                </div>
                            </div>
                                `;
                                $('#ordersContainer').append(orderHTML);

                            }
                        });
                    } 
                },
                error: function (xhr, status, error) {
                    $('#ordersContainer').empty();
                    var NoOrder = `<div class="card">
                                        <div class="card-body">
                                            ${xhr.responseText}
                                        </div>
                                        </div>`;
                        $('#ordersContainer').append(NoOrder);
                }
            });
        }
    </script>
</body>

</html>