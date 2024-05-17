<?php
include ("TopMenu.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    
</head>
<link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
<body>
    <div class="container">
        <div class="container"style="padding:30px; width:40%;">
            <form class="d-flex" role="search" >
                <input class="form-control me-2" id="SearchedItem" type="search" name="search"  placeholder="Enter Your Order ID" aria-label="Search">
                    <button  class="btn btn-primary"  type="button" id="SearchOrder" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                                viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                    </button>
            </form>
        </div>
    </div>
    
    <div class="container">
        <div class="alert alert-discovery" role="alert">
            <div class="d-flex gap-4">
                <span><i class="fa-solid fa-circle-question icon-discovery"></i></span>
                <div class="d-flex flex-column gap-2">
                <h6 class="mb-0">Enter Your Order ID</h6>
                <p class="mb-0">in the search bar to view your order status !</p>
                </div>
            </div>
            </div>
    </div>
    <div class="modal fade" tabindex="-1" id="YourOrderStatus" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="OrdId">Order ID : #Co6526ID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="green iguana" />
                <div class="card-body">
                    <h4 id = "CarNameId">BMW X1 (#Vc2488Id)</h4>
                    <p class="card-text">
                    <table class="table table-striped">
                        
                        <tbody>
                            <tr>
                                <th  scope="row">Estimated Price : </th>
                                <td  id="estimated">Rs.200000 </td>
                                <th scope="row">Destination : </th>
                                <td id="destination"></td>
                        </tr>
                        <tr >
                            <th scope="row">Pickup Location : </th>
                            <td id="StartLocation">Pokhara</td>
                            <th>
                               Order Status :
                            </th>
                            <td scope="row" id="OrderStatus">Pending</td>
                        </tr>
                        
                        
                        </tbody>
                    </table>
                </p>
            </div>
    </div>
            </div>
            <div class="modal-footer">
                
            </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {

                $(document).on("click", "#SearchOrder", function () {
                var Order_ID = $('#SearchedItem').val();
                console.log(Order_ID);
                $.ajax({
                type: "POST",
                    url: "CarDetails.php",
                    data: {
                        'checking_checkOrder': true,
                        'Order_ID' : Order_ID,
                    },
                dataType: 'json', // Expecting JSON response
                success: function (response) {
                        $('#YourOrderStatus').modal('show');
                        $.each(response, function (key, carView) { 
                            
                                $('#OrdId').text("Order ID : "+Order_ID);
                                $('#CarNameId').text(carView['Car']+"("+carView['CarID']+")");
                                $('#estimated').text(carView['estimatedPrice']);
                                $('#destination').text(carView['Destination']);
                                $('#StartLocation').text(carView['StartLocation']);
                                $('#OrderStatus').text(carView['Status']);
                            });
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
            }});
            });
        });

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>