<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vroom Admin </title>
    <link rel="stylesheet" href="/Adminfront/style2.css">
    <link rel="stylesheet" href="InquiresStyle2.css">
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
                <a href="\Adminfront\OrderList\OrderList.php" class="Link"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/12657/12657036.png"></div>Order Detail</li></a>
                <a href="\Adminfront\Employee\Employee.php" class="Link"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/1324/1324372.png"></div>Employee</li></a>
                <a href="\Adminfront\Inquires\Inquires.php" class="Link"id="Active"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/6500/6500779.png"></div>Inquires</li></a>
                <a href="/Adminfront/Inventory/Inventory.php" class="Link"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/15546/15546746.png"></div>Inventory</li></a>
            </ul>
        </div>
    </section>
    <section class="Right-container">
        <div class="Hori-nav">
            <div class="search"> 
                <p1>Inquires Details</p1>
                <p>Your costumer Concerns !</p>
            </div>
            <div class="info">
                <div class="Admin-Name">Hello, Admin</div>
                <div class="profile"></div>
            </div>
        </div>
        <div class="modal fade" id="Inq-mod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <label for="Name" id="Name">Costomer Name :</label>
                            </div>
                            <div class="col-12">
                                <label for="Type"id="inquiry">Inquiry : </label>
                            </div>
                            <div class="col-12">
                                <label for="Type"id="Type">Feedback : </label>
                                <textarea class=" col-12 Feedback"></textarea>
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
        <div class="inq-area">
        </div>
            
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>   
        $(document).ready(function () {
            getdata();
        });
        $(document).on("click", ".Costomer-inq", function () {
            C_Name = $(this).find(".Costomer-name").text();
            $('#Inq-mod').modal('show');
        });
        function getdata()
        {
            $.ajax({
                type: "GET",
                url: "fetch.php",
                success: function (response) {
                    // console.log(response);
                    $.each(response, function (key, value) { 
                        $('.inq-area').append(` <div class="Costomer-inq">
                                                    <div class="inq-left">
                                                        <div class="in-left-up">
                                                            <div class="profile-img"  style="background-image: url('${value['profileImageAddress']}');">

                                                            </div>
                                                            <div class="Costomer-name">
                                                                <h6 class = "C-name">${value['Name']}</h6>
                                                            </div>
                                                        </div>
                                                        <div class="in-left-down">
                                                            <p>${value['InquireBody']}</p>
                                                        </div>
                                                    </div>
                                                    <div class="inq-right" style="background-image: url('${value['CarImageAddress']}');">

                                                    </div>`);
                    });
                }
            });
        }
        
    </script>
</body>
</html>