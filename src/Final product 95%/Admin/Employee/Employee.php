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
</head>
<body>
   
    <section class="Right-container">
        <div class="Hori-nav">
            <div class="search"> 
                <p1>Employee Details</p1>
                <p>Your Task Force!</p>
            </div>

        </div>
        <!-- <div class="Order-search">
            <input type="text" placeholder="Search here !" id="search-bar">
            <button id="Search-btn"> <img src="https://cdn-icons-png.flaticon.com/128/622/622669.png"></button>
        </div> -->
        <div class="User-list">
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Employee ID</th>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Contact</th>
                <th scope="col">Hire Date</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="Employee-List">
                
            </tbody>
            </table>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script> 
    $(document).ready(function () {
            getdata();
        });
    function getdata()
        {
            $.ajax({
                type: "GET",
                url: "fetchEmployee.php",
                success: function (response) {
                    console.log(response);
                    $.each(response, function (key, value) { 
                        $('.Employee-List').append(`<tr>
                                                <th scope="row" >${value["EmployeeID"]}</th>
                                                <td>${value["Name"]}</td>
                                                <td>${value["Department"]}</td>
                                                <td>${value["Contact"]}</td>
                                                <td>${value["HireDate"]}</td>
                                                <td class="table-success">${value["Status"]}</td>
                                                </tr>
                                                `);
                    });
                }
            });
        }</script>
</body>
</html>