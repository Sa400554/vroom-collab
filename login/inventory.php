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