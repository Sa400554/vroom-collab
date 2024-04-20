<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vroom Admin </title>
    <link rel="stylesheet" href="/Adminfront/style3.css">
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
                <a href="\Adminfront\Employee\Employee.php" class="Link"id="Active"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/1324/1324372.png"></div>Employee</li></a>
                <a href="\Adminfront\Inquires\Inquires.php" class="Link"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/6500/6500779.png"></div>Inquires</li></a>
                <a href="\Adminfront\Inventory\Inventory.php" class="Link"><li><div class="nav-icons"><img src="https://cdn-icons-png.flaticon.com/128/15546/15546746.png"></div>Inventory</li></a>
            </ul>
        </div>
    </section>
    <section class="Right-container">
        <div class="Hori-nav">
            <div class="search"> 
                <p1>Employee Details</p1>
                <p>Your Task Force!</p>
            </div>
            <div class="info">
                <div class="Admin-Name">Hello, Admin</div>
                <div class="profile"></div>
            </div>
        </div>
        <div class="Order-search">
            <input type="text" placeholder="Search here !" id="search-bar">
            <button id="Search-btn"> <img src="https://cdn-icons-png.flaticon.com/128/622/622669.png"></button>
        </div>
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