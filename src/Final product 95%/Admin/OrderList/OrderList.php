<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'));
        var toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl);
        });
        toastList.forEach(function (toast) {
            toast.show();
        });
    });
</script>
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
    <link rel="stylesheet" href="/Adminfront/style2.css">
<link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous"></head>

<body>
    
    <section class="Right-container">
        
        <div class="Hori-nav">
            <div class="search"> 
                <p1>Order Details</p1>
                <p>The costumer orders!</p>
            </div>

        </div>
        <div class="Notify">
            
        </div>
            <div class="modal fade " id="EditCars" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background:none;">
            <div class="modal-dialog modal-dialog-centered" style="background:none;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Orders</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <label for="Name"> Car Name</label>
                                <input type="text" class="form-control" id="Name">
                            </div>
                            <div class="col-6">
                                <label for="OrderId">OrderId</label>
                                <input type="text" class="form-control" id="OrderId">
                            </div>
                            <div class="col-6">
                                <label for="EndLocation">Destination</label>
                                <input type="text" class="form-control" id="EndLocation">        
                            </div>
                            <div class="col-6">
                                <label for="Number">Number</label>
                                <input type="text" class="form-control" id="Number">        
                            </div>
                            <div class="col-6">
                                <label for="Email">Email</label>
                                <input type="text" class="form-control" id="Email">        
                            </div>
                            <div class="col-6">
                                <label for="Type">Payment Type</label>
                                <input type="text" class="form-control" id="PaymentType">
                            </div>
                            <div class="col-6">
                                <label for="estimatedPrice">Estimated Price</label>
                                <input type="text" class="form-control" id="estimatedPrice">
                            </div>
                            <div class="col-6">
                                <label for="User Id">User ID</label>
                                <input type="text" class="form-control" id="UserId">
                            </div>
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary " id='Car_D_Update' >Update</button>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="container Empty-Msg">

        </div>
        <div class="User-list">
            
            <table class="table table-borderless">
                <thead>
                    <tr>
                    <th scope="col"  >Order ID</th>
                    <th scope="col"> Order Status</th>
                    <th scope="col">Car</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Estimated Price</th>
                    <th scope="col">Payment Type</th>
                    <th scope="col">Select Order State</th>
                    </tr>
                    
                </thead>
                <tbody class="Order-List">
                    
                </tbody>
                </table>
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
     $('#Car_D_Update').click(function (e) { 
                e.preventDefault();
                var OrderId = $('#OrderId').val();
                var Destination = $('#EndLocation').val();
                var Number = $('#Number').val();
                var Email = $('#Email').val();
                var estimatedPrice = $('#estimatedPrice').val();
                
               $.ajax({
                    type: "POST",
                    url: "/Adminfront/connection.php",
                    data: {
                        'EDIT':true,
                        'OrderId': OrderId,
                        'Destination': Destination,
                        'Number': Number,
                        'Email': Email,
                        'estimatedPrice': estimatedPrice
                    },
                    success: function(response) {
                        if (response == "1") {
                            $('#EditCars').modal('hide');
                            $('.Notify').append(`<div class="toast-container top-0 start-50 translate-middle-x p-3">
                                <div class="toast show fade bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-body bg-success">
                                    <div class="d-flex gap-4 bg-success">
                                    <span class="text-primary bg-success"><i class="fa-solid fa-circle-info fa-lg"></i></span>
                                    <div class="d-flex flex-grow-1 align-items-center bg-success">
                                        <span class="fw-semibold text-light bg-success">Order Updated Successfully !</span>
                                        <button type="button" class="btn-close btn-close-sm btn-close-black ms-auto" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>`);
                            // console.log(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#EditCars').modal('hide');
                        console.log(error);
                    }
                });

            });
</script>
        

</body>
</html>